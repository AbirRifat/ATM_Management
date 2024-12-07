<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fund Transfer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fund_transfer.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Fund Transfer</h3>
                    </div>
                    <div class="card-body">
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('transfer') }}" method="POST">
                            @csrf
                            <!-- Receiver Account Number -->
                            <div class="mb-4">
                                <label for="receiver_account" class="form-label">Receiver's Account Number</label>
                                <input type="text" id="receiver_account" name="receiver_account"
                                    class="form-control @error('receiver_account') is-invalid @enderror"
                                    placeholder="Enter Receiver's Account Number" required
                                    value="{{ old('receiver_account') }}">
                                @error('receiver_account')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Transfer Amount -->
                            <div class="mb-4">
                                <label for="amount" class="form-label">Amount to Transfer</label>
                                <input type="number" id="amount" name="amount"
                                    class="form-control @error('amount') is-invalid @enderror" min="1"
                                    placeholder="Enter Amount to Transfer" required value="{{ old('amount') }}">
                                @error('amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="row mt-3">
                    <!-- Return to Dashboard -->
                    <div class="col-md-6">
                        <a href="{{ route('userDashboard') }}" class="btn btn-secondary w-100">Return to Dashboard</a>
                    </div>
                    <!-- Logout -->
                    <div class="col-md-6">
                        <a href="{{ route('logout') }}" class="btn btn-danger w-100">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
