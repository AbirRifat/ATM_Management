<!-- resources/views/userDashboard/balance.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balance Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/balance.css') }}">
</head>

<body>
    <div class="container my-5">

        <!-- Account Details -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-success">Account Details</h1>
            <p class="lead">Here are your account details.</p>
        </div>

        <!-- Display Error Message if exists -->
        @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <div class="card mb-4 shadow-lg rounded-3">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Account Details</h5>
            </div>

            <div class="card-body">
                @if($account)
                    <h5 class="card-title fs-4 mb-3 text-primary">Name: {{ $account->name }}</h5>
                    <p class="card-text fs-5 text-muted mb-2"><i class="bi bi-credit-card me-2"></i>Account Number:
                        {{ $account->account_number }}</p>
                    <p class="card-text fs-5 text-success mb-0"><i class="bi bi-wallet2 me-2"></i>Balance:
                        {{ number_format($account->balance, 2) }} BDT</p>
                @else
                    <p class="text-center text-danger">Account details not available. Please try again later.</p>
                @endif
            </div>
        </div>

        <!-- Buttons in the same line -->
        <div class="d-flex justify-content-between">
            <!-- Return to User Dashboard Button -->
            <a href="{{ route('userDashboard') }}" class="btn btn-success w-48">Return to User Dashboard</a>

            <!-- Return to Dashboard Button (session reset) -->
            <a href="{{ route('logout') }}" class="btn btn-danger w-48">Return to Dashboard</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
