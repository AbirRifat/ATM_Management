<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user-dashboard.css') }}">
</head>

<body>
    <div class="container my-5">
        <!-- Welcome Message -->
        <div class="text-center mb-5">
            <h1 class="fw-bold text-success">Welcome!</h1>
            <p class="lead">You are a verified user. Feel free to use the ATM functionalities below.</p>
        </div>

        <!-- Success Message Display -->
        @if (session('success'))
            <div id="successMessage" class="alert alert-success text-center mx-auto" style="width: 500px;">
                {{ session('success') }}
            </div>
            <script>
                // Automatically hide the success message after 4 seconds
                setTimeout(function() {
                    document.getElementById('successMessage').style.display = 'none';
                }, 4000); // Hide after 4 seconds
            </script>
        @endif

        <!-- Functionality Section -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="atm-card">
                    <div class="atm-card-header text-center">
                        <h3 class="text-uppercase fw-bold">ATM Functionalities</h3>
                    </div>
                    <div class="atm-card-body">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <!-- Action Buttons -->
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-primary" onclick="navigateTo('balance')">
                                    <i class="bi bi-piggy-bank"></i> Balance Inquiry
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-danger" onclick="navigateTo('withdraw')">
                                    <i class="bi bi-cash"></i> Cash Withdrawal
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-success" onclick="navigateTo('deposit')">
                                    <i class="bi bi-cash-coin"></i> Cash Deposit
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-warning" onclick="navigateTo('transfer')">
                                    <i class="bi bi-arrow-right-circle"></i> Fund Transfer
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-secondary"
                                    onclick="navigateTo('change-pin')">
                                    <i class="bi bi-key"></i> Change PIN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Return to Dashboard Button (session reset) -->
        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('logout') }}"
                class="btn btn-danger w-50 py-3 px-5 fs-5 d-flex align-items-center justify-content-center rounded-pill shadow-lg hover-effect fw-bold"
                style="margin-right: 320px;">
                <i class="bi bi-house-door-fill me-2"></i> Return to Dashboard / LOGOUT
            </a>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function navigateTo(action) {
            // Redirect to the appropriate route
            switch (action) {
                case 'balance':
                    window.location.href = "{{ route('balance') }}";
                    break;
                case 'withdraw':
                    window.location.href = "{{ route('withdraw.form') }}";
                    break;
                case 'deposit':
                    window.location.href = "{{ route('deposit.form') }}";
                    break;
                case 'transfer':
                    window.location.href = "{{ route('transfer.form') }}";
                    break;
                case 'change-pin':
                    window.location.href = "{{ route('pin.change.form') }}";
                    break;
                default:
                    alert("Invalid action!");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
