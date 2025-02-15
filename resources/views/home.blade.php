<x-bootlayout>
    @if (session()->get('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
       <strong>Success!</strong> {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="mt-4 p-5 bg-primary text-white rounded">
    <h1>Hello, {{$user->name}}</h1>
    <p>Your Registerd Email: {{$user->email}}</p>
</div>





</x-bootlayout>
