<x-bootlayout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg border-0 rounded-4 w-50 p-5">
            <h3 class="text-center text-primary mb-4 font-weight-bold">Create Account</h3>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="form-group mb-4">
                    <label for="name" class="form-label text-muted">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control shadow-sm border-0 rounded-lg" required placeholder="Enter your full name">
                </div>

                <div class="form-group mb-4">
                    <label for="email" class="form-label text-muted">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control shadow-sm border-0 rounded-lg" required placeholder="Enter your email">
                </div>

                <div class="form-group mb-4">
                    <label for="password" class="form-label text-muted">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm border-0 rounded-lg" required placeholder="Enter your password">
                </div>

                <div class="form-group mb-5">
                    <label for="password_confirmation" class="form-label text-muted">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control shadow-sm border-0 rounded-lg" required placeholder="Confirm your password">
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 shadow-sm hover-shadow-lg">Register</button>

                <div class="mt-4 text-center">
                    <small class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Login here</a></small>
                </div>
            </form>
        </div>
    </div>

    <style>
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .hover-shadow-lg:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .container {
            background-color: #f8f9fa;
        }

        .card {
            background-color: #ffffff;
        }

        .font-weight-bold {
            font-weight: 700;
        }
    </style>
</x-bootlayout>
