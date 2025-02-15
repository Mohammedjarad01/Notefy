<x-bootlayout>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <h1 class="navbar-brand" href="#">{{ auth()->user()->name }}</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profile">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center rounded-top">
                <h2>Welcome to Your Dashboard</h2>
                <p class="mb-0">Hello, <span class="text-warning">{{ auth()->user()->name }}</span>!</p>
            </div>
            <div class="card-body text-center">
                <p class="lead">This is your personalized dashboard where you can manage your activities and explore
                    more features.</p>
                <a href="{{ route('dashboard.logout') }}"
                    class="btn btn-danger btn-lg rounded-pill px-4 py-2 mt-3 shadow">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 50px;
            background-color: #ffffff;
        }

        .card-header {
            font-family: 'Arial', sans-serif;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .btn-danger {
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
            box-shadow: 0 4px 10px rgba(200, 35, 51, 0.3);
        }

        .lead {
            font-size: 1.25rem;
            font-weight: 300;
            color: #6c757d;
        }
    </style>
</x-bootlayout>
