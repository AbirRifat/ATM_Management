<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/atm-dashboard.css') }}">
</head>

<body>
    <div class="container my-5">

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert"
                style="width: 500px; margin: 0 auto; position: fixed; top: 10px; left: 50%; transform: translateX(-50%); text-align: center;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                style="width: 500px; margin: 0 auto; position: fixed; top: 10px; left: 50%; transform: translateX(-50%); text-align: center;">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="atm-card">
                    <div class="atm-card-header text-center">
                        <h3 class="text-uppercase fw-bold">ATM Dashboard</h3>
                    </div>
                    <div class="atm-card-body">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <!-- Action Buttons -->
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#pinModal" data-action="balance">
                                    <i class="bi bi-piggy-bank"></i> Balance Inquiry
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#pinModal" data-action="withdraw">
                                    <i class="bi bi-cash"></i> Cash Withdrawal
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#pinModal" data-action="deposit">
                                    <i class="bi bi-cash-coin"></i> Cash Deposit
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#pinModal" data-action="transfer">
                                    <i class="bi bi-arrow-right-circle"></i> Fund Transfer
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn atm-btn btn-secondary" data-bs-toggle="modal" data-bs-target="#pinModal" data-action="pin.change">
                                    <i class="bi bi-key"></i> Change PIN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PIN Modal -->
    <div class="modal fade" id="pinModal" tabindex="-1" aria-labelledby="pinModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pinModalLabel">Enter Your PIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pinForm" method="POST" action="{{ route('atm.validate.pin') }}">
                        @csrf
                        <input type="hidden" id="actionType" name="action_type" value="">
                        <div class="mb-3">
                            <label for="pin" class="form-label">PIN</label>
                            <input type="password" class="form-control" id="pin" name="pin"
                                placeholder="Please Enter 4 Digit PIN" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                        <div id="pinWarning" class="text-danger mt-2" style="display: none;">Please Enter a Valid 4-Digit PIN</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pinModal = document.getElementById('pinModal');
            pinModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const actionType = button.getAttribute('data-action');
                document.getElementById('actionType').value = actionType; // Set the action dynamically
            });

            document.getElementById('pinForm').addEventListener('submit', function (e) {
                const pin = document.getElementById('pin').value;
                if (pin.length !== 4) {
                    e.preventDefault();
                    document.getElementById('pinWarning').style.display = 'block';
                } else {
                    document.getElementById('pinWarning').style.display = 'none';
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
