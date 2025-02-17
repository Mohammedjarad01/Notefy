<x-bootlayout>
    <div class="container mt-5">
        <!-- عنوان الصفحة -->
        <header class="text-center mb-4">
            <h1 class="fw-bold text-warning">📝 عرض الملاحظة</h1>
            <p class="text-muted">تفاصيل الملاحظة التي قمت بإضافتها</p>
        </header>

        <div class="card shadow-lg border-0 rounded-4">
            <div id="mycarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 overflow-hidden">
                    @php
                        $images = json_decode($note->images , true);
                    @endphp

                    @foreach ($images as $key => $image)
                        <div class="carousel-item {{$key==0 ? 'active' : ''}}" data-bs-interval="2000">
                            <img src="{{ asset('storage/public/uploads/' . $image) }}" class="d-block w-100" style="height: 400px; object-fit: cover;" alt="...">
                        </div>
                    @endforeach
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#mycarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mycarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="card-body text-center">
                <h5 class="card-title text-primary fw-bold mb-3">{{ $note->title }}</h5>
                <p class="card-text text-muted">{{ $note->note }}</p>

                <div class="d-flex justify-content-center gap-2 mt-4">
                    <a href="{{ route('note.index') }}" class="btn btn-outline-primary btn-sm px-4">Back</a>
                    <a href="{{ route('note.edit', $note) }}" class="btn btn-outline-success btn-sm px-4">Edit</a>
                    <form action="{{ route('note.destroy', $note) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-bootlayout>
