<x-bootlayout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100" style="background-color: #f8f9fa;">
        <div class="card shadow-lg border-0 rounded-4 w-50 p-5" style="max-width: 400px; background: #ffffff;">
            <h3 class="text-center text-primary mb-4 font-weight-bold">Welcome Back</h3>
            <p class="text-center text-muted mb-4">Please login to your account</p>

            @if (session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="form-group mb-4">
                    <label for="email" class="form-label text-muted">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control shadow-sm border-0 rounded-lg" required placeholder="Enter your email">
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="form-label text-muted">Password</label>
                    <input type="password" name="password" id="password" class="form-control shadow-sm border-0 rounded-lg" required placeholder="Enter your password">
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 rounded-3 shadow-sm hover-shadow-lg">Login</button>

                <div class="mt-3 text-center">
                    <small class="text-muted">Don't have an account?
                        <a href="{{ route('register') }}" class="text-primary font-weight-bold">Register</a>
                    </small>
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

        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .text-primary {
            color: #007bff !important;
        }
    </style>
</x-bootlayout>
