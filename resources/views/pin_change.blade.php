<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change PIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/pin_change.css')}}">
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header text-center">
                <h3><i class="bi bi-lock-fill icon"></i> Change PIN</h3>
            </div>
            <div class="card-body">
                <!-- Display success or error messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('pin.change') }}" method="POST">
                    @csrf

                    <!-- Old PIN -->
                    <div class="mb-3">
                        <label for="old_pin" class="form-label">Old PIN</label>
                        <div class="input-group">
                            <input type="password" id="old_pin" name="old_pin" class="form-control" placeholder="Enter old PIN" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('old_pin')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('old_pin')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- New PIN -->
                    <div class="mb-3">
                        <label for="new_pin" class="form-label">New PIN</label>
                        <div class="input-group">
                            <input type="password" id="new_pin" name="new_pin" class="form-control" placeholder="Enter new PIN" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('new_pin')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('new_pin')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm New PIN -->
                    <div class="mb-3">
                        <label for="new_pin_confirmation" class="form-label">Confirm New PIN</label>
                        <div class="input-group">
                            <input type="password" id="new_pin_confirmation" name="new_pin_confirmation" class="form-control" placeholder="Confirm new PIN" required>
                            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('new_pin_confirmation')">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('new_pin_confirmation')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100">Change PIN</button>
                </form>
            </div>
        </div>

        <!-- Buttons Outside the Card, Aligned Horizontally -->
        <div class="d-flex justify-content-center mt-3">
            <!-- Return to User Dashboard Button -->
            <a href="{{ route('userDashboard') }}" class="btn btn-secondary w-48 mx-4">Return to User Dashboard</a>

            <!-- Return to Dashboard Button (session reset) -->
            <a href="{{ route('logout') }}" class="btn btn-danger w-48 mx-4">Return to Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility function
        function togglePassword(fieldId) {
            var input = document.getElementById(fieldId);
            var button = input.nextElementSibling;
            if (input.type === "password") {
                input.type = "text";
                button.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                input.type = "password";
                button.innerHTML = '<i class="bi bi-eye"></i>';
            }
        }
    </script>
</body>

</html>
