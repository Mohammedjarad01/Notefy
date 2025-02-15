<x-dashboard>
   @if (session('msg'))

   <div class="alert alert-success" role="alert">
   {{session('msg')}}
  </div>

   @endif

    <!-- Profile Form -->
    <div class="form-container">
        <div class="profile-form">
            <h2 class="form-title">Update Profile</h2>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input hidden value="{{auth()->user()->id}}" name="id">
                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ auth()->user()->name }}" required />
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required />
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit">Update Profile</button>
            </form>
        </div>
    </div>

    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .navbar .nav-links li {
            display: inline;
        }

        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .navbar .nav-links a:hover {
            color: #cce5ff;
        }

        /* Form Container */
        .form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .profile-form {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        .form-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: #0056b3;
        }
    </style>
</x-dashboard>
