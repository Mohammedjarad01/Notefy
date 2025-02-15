<x-bootlayout>
    <div class="container mt-5">
        <!-- رسالة النجاح -->
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- صندوق النموذج -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Upload Your File</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('photo.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- إدخال الملف -->
                    <div class="mb-3">
                        <label for="file" class="form-label">Choose a File</label>
                        <input type="file" name="image" id="formFile">

                    </div>

                    <!-- إرسال -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-cloud-upload"></i> Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-bootlayout>
