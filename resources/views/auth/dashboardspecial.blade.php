<x-bootlayout>
    <div class="container mt-5">
        <h1 class="text-center">Welcome, {{ auth()->user()->name }}</h1>
        <h4 class="text-center">User Data</h4>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="{{ route('dashboard.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>
</x-bootlayout>
