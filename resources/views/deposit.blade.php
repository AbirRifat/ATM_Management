<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Funds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/deposit_withdraw.css') }}">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Deposit Funds</h3>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('deposit') }}" method="POST" class="p-4">
                @csrf

                <!-- Remaining Balance -->
                <div class="mb-3">
                    <label for="remaining-balance" class="form-label">Your Remaining Balance</label>
                    <input type="text" class="form-control remaining-balance" id="remaining-balance"
                        value="{{ number_format($balance, 2) }}" readonly>
                </div>

                <!-- Predefined Deposit Amounts -->
                <div class="mb-3 amount-options">
                    <label for="amount" class="form-label">Choose an Amount (Minimum 500)</label><br>
                    <input type="radio" id="amount-500" name="amount" value="500">
                    <label for="amount-500">500</label>
                    <input type="radio" id="amount-1000" name="amount" value="1000">
                    <label for="amount-1000">1000</label>
                    <input type="radio" id="amount-5000" name="amount" value="5000">
                    <label for="amount-5000">5000</label>
                    <input type="radio" id="amount-10000" name="amount" value="10000">
                    <label for="amount-10000">10000</label>
                </div>

                <!-- Custom Deposit Amount -->
                <div class="mb-3">
                    <label for="display-amount" class="form-label">Amount to Deposit</label>
                    <input type="text" class="form-control" id="display-amount" name="display_amount"
                        placeholder="Enter amount">
                </div>

                <button type="submit" class="btn btn-primary w-100">Deposit</button>
            </form>
        </div>

        <!-- Buttons in the same line -->
        <div class="d-flex justify-content-between mt-3">
            <!-- Return to User Dashboard Button -->
            <a href="{{ route('userDashboard') }}" class="btn btn-secondary w-48">Return to User Dashboard</a>

            <!-- Return to Dashboard Button (session reset) -->
            <a href="{{ route('logout') }}" class="btn btn-danger w-48">Return to Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const amountOptions = document.querySelectorAll('.amount-options input[type="radio"]');
        const displayAmountInput = document.getElementById('display-amount');

        // Update the display amount when a predefined amount is selected
        amountOptions.forEach(option => {
            option.addEventListener('change', () => {
                displayAmountInput.value = option.value; // Update display with selected predefined amount
            });
        });

        // Clear radio selections when a custom amount is entered
        displayAmountInput.addEventListener('input', () => {
            amountOptions.forEach(option => option.checked = false); // Clear radio buttons
        });
    </script>
</body>

</html>
