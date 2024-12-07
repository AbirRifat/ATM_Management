<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/confirm-transfer.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <i class="fas fa-money-check-alt confirm-icon fa-2x"></i>
                        <h3 class="mt-2">Confirm Transfer</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="mb-4 text-center">Please confirm the details before proceeding:</h5>
                        <ul class="list-group mb-4">
                            <li class="list-group-item"><strong>Receiver's Name:</strong> {{ $receiverDetails['name'] }}
                            </li>
                            <li class="list-group-item"><strong>Receiver's Account Number:</strong>
                                {{ $receiverDetails['account_number'] }}</li>
                            <li class="list-group-item"><strong>Amount to Transfer:</strong>
                                {{ number_format($receiverDetails['amount'], 2) }}</li>
                        </ul>

                        <form action="{{ route('confirmTransfer') }}" method="POST">
                            @csrf
                            <input type="hidden" name="receiver_account"
                                value="{{ $receiverDetails['account_number'] }}">
                            <input type="hidden" name="amount" value="{{ $receiverDetails['amount'] }}">

                            <button type="submit" class="btn btn-primary w-100">Confirm & Transfer</button>
                        </form>
                    </div>
                </div>

                <div class="mt-3 text-center">
                    <a href="{{ route('transfer.form') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
