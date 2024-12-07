<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pin;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ATMController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Dashboard view will contain action buttons
    }

    public function handlePinRequest(Request $request)
    {
        $request->validate([
            'pin' => 'required|string|digits:4',
            'action_type' => 'required|string',
        ]);

        $pin = $request->input('pin');
        $actionType = $request->input('action_type');

        // Find the user with the matching PIN
        $pinRecord = Pin::where('pin', $pin)->first();

        if ($pinRecord) {
            $user = User::find($pinRecord->user_id);

            if ($user) {
                // Log in the user using Auth
                Auth::login($user);

                // Set session to mark PIN validation
                session(['pin_validated' => true]);

                return redirect()->route('userDashboard')
                    ->with('success', ucfirst($actionType) . ' selected successfully!');
            }
        }

        return back()->with('error', 'Incorrect PIN. Please try again.');
    }


    public function userDashboard()
    {
        return view('userDashboard'); // Render the user dashboard view
    }

    public function balance()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Retrieve account information from the database
        $account = DB::table('accounts')
            ->join('users', 'accounts.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->first(['users.name', 'accounts.account_number', 'accounts.balance']);

        if ($account) {
            return view('balance', compact('account'));
        }

        return redirect()->route('userDashboard')->with('error', 'Account not found.');
    }

    public function remBal()
    {
        // Get the user ID from the authenticated user
        $userId = Auth::id();

        // Retrieve account information from the database
        $account = DB::table('accounts')
            ->where('user_id', $userId)
            ->first(['balance']);  // Only retrieve balance

        // If the account exists, return the balance
        return $account ? $account->balance : 0;
    }

    public function withdrawForm()
    {
        $balance = $this->remBal();  // Get balance from remBal function
        return view('withdraw', compact('balance'));  // Pass balance to the view
    }

    public function withdraw(Request $request)
    {
        // Validate the withdrawal amount
        $request->validate([
            'user_id' => 'required|exists:accounts,user_id', // Ensure the user ID exists in accounts
            // Ensure 'amount' or 'display_amount' is provided, but not both
            'amount' => 'nullable|numeric|min:500|required_without:display_amount',
            'display_amount' => 'nullable|numeric|min:500|required_without:amount',
        ]);

        // Get the user ID from the authenticated user
        $userId = Auth::id();

        // Get the withdrawal amount from either predefined or custom input
        $amount = $request->input('amount') ?: $request->input('display_amount');

        // Retrieve the user's account from the database
        $account = Account::where('user_id', $userId)->first();

        // Check if the account exists and if the balance is enough for the withdrawal
        if ($account && $account->balance >= $amount) {
            // Process the withdrawal
            $account->balance -= $amount;
            $account->save();

            // Log the transaction (transaction type as 'withdrawal')
            Transaction::create([
                'account_id' => $account->id,
                'transaction_type' => 'withdrawal',
                'amount' => $amount,
            ]);

            return redirect()->route('userDashboard')->with('success', 'Withdraw successful. Thank you!');
        }

        // If not enough balance or account not found, show an error
        return back()->withErrors(['amount' => 'Insufficient funds or account not found.']);
    }

    public function depositForm()
    {
        $balance = $this->remBal();  // Get balance from remBal function
        return view('deposit', compact('balance'));  // Pass balance to the view
    }

    public function deposit(Request $request)
    {
        // Validate the deposit amount
        $request->validate([
            'amount' => 'nullable|numeric|min:500|required_without:display_amount',
            'display_amount' => 'nullable|numeric|min:500|required_without:amount',
        ]);

        // Get the authenticated user's ID
        $userId = Auth::id();
        $amount = $request->input('amount') ?: $request->input('display_amount'); // Choose the amount based on input

        // Retrieve the user's account
        $account = Account::where('user_id', $userId)->first();

        if ($account) {
            // Process the deposit
            $account->balance += $amount;
            $account->save();

            // Log the transaction (transaction type as 'deposit')
            Transaction::create([
                'account_id' => $account->id,
                'transaction_type' => 'deposit',
                'amount' => $amount,
            ]);

            return redirect()->route('userDashboard')->with('success', 'Deposit successful. Thank you!')
                ->with('status', 'success');
        }

        return back()->withErrors(['amount' => 'Account not found.']);
    }

    public function transferForm()
    {
        $balance = $this->remBal(); // Assuming remBal() method returns the current user's balance
        return view('transfer', compact('balance'));
    }

    public function transfer(Request $request)
    {
        $request->validate([
            'receiver_account' => 'required|exists:accounts,account_number',
            'amount' => 'required|numeric|min:1',
        ]);

        // Fetch the authenticated user's account
        $senderId = Auth::id();
        $senderAccount = Account::where('user_id', $senderId)->first();

        if (!$senderAccount) {
            return back()->withErrors(['account' => 'Sender account not found.']);
        }

        // Check if the sender is attempting to transfer to their own account
        $receiverAccountNumber = $request->input('receiver_account');
        if ($senderAccount->account_number === $receiverAccountNumber) {
            return back()->withErrors(['receiver_account' => 'You cannot transfer funds to your own account.']);
        }

        // Check sufficient balance
        $amount = $request->input('amount');
        if ($senderAccount->balance < $amount) {
            return back()->withErrors(['amount' => 'Insufficient balance to transfer the funds.']);
        }

        // Fetch the receiver's account
        $receiverAccount = Account::where('account_number', $receiverAccountNumber)->first();

        if (!$receiverAccount) {
            return back()->withErrors(['receiver_account' => 'Receiver account not found.']);
        }

        // Prepare receiver details for confirmation
        $receiverDetails = [
            'name' => $receiverAccount->user->name,
            'account_number' => $receiverAccount->account_number,
            'amount' => $amount,
        ];

        return view('confirm-transfer', compact('receiverDetails', 'senderId'));
    }


    public function confirmTransfer(Request $request)
    {
        $request->validate([
            'receiver_account' => 'required|exists:accounts,account_number',
            'amount' => 'required|numeric|min:1',
        ]);

        // Fetch the authenticated user's account
        $senderId = Auth::id();
        $senderAccount = Account::where('user_id', $senderId)->first();

        if (!$senderAccount) {
            return back()->withErrors(['account' => 'Sender account not found.']);
        }

        // Check sufficient balance
        $amount = $request->input('amount');
        if ($senderAccount->balance < $amount) {
            return back()->withErrors(['amount' => 'Insufficient balance to transfer the funds.']);
        }

        // Fetch the receiver's account
        $receiverAccountNumber = $request->input('receiver_account');
        $receiverAccount = Account::where('account_number', $receiverAccountNumber)->first();

        if (!$receiverAccount) {
            return back()->withErrors(['receiver_account' => 'Receiver account not found.']);
        }

        // Perform the transfer
        $senderAccount->balance -= $amount;
        $senderAccount->save();

        $receiverAccount->balance += $amount;
        $receiverAccount->save();

        // Log transactions
        Transaction::create([
            'account_id' => $senderAccount->id,
            'transaction_type' => 'debit',
            'amount' => $amount,
        ]);

        Transaction::create([
            'account_id' => $receiverAccount->id,
            'transaction_type' => 'credit',
            'amount' => $amount,
        ]);

        return redirect()->route('userDashboard')->with('success', 'Transfer successful.');
    }

    public function showPinChangeForm()
    {
        return view('pin_change');
    }

    public function changePin(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Validate the inputs
        $request->validate([
            'old_pin' => 'required|numeric|digits:4',
            'new_pin' => 'required|numeric|digits:4',
            'new_pin_confirmation' => 'required|numeric|digits:4|same:new_pin',
        ]);

        // Find the pin record for the current user
        $pin = Pin::where('user_id', $userId)->first();

        // Check if the pin record exists
        if (!$pin) {
            return back()->withErrors(['old_pin' => 'No PIN record found for your account.']);
        }

        // Check if the old PIN is correct
        if ($pin->pin !== $request->input('old_pin')) {
            return back()->withErrors(['old_pin' => 'The old PIN is incorrect.']);
        }

        // Update the PIN in the pins table
        $pin->pin = $request->input('new_pin');
        $pin->save();

        // Redirect back with a success message
        return redirect()->route('userDashboard')->with('success', 'PIN changed successfully.');
    }


    public function logout()
    {
        // Log out the authenticated user
        Auth::logout();

        // Optionally clear all session data
        Session::flush();

        // Redirect to the login or PIN verification page
        return redirect()->route('dashboard')->with('success', 'You have been logged out.');
    }



}

