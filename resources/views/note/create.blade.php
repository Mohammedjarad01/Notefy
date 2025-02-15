<x-bootlayout>
    <div class="container mt-5">
        <!-- عنوان الصفحة -->
        <header class="text-center mb-4">
            <h1 class="fw-bold text-warning">📝 إضافة ملاحظة جديدة</h1>
            <p class="text-muted">قم بإضافة ملاحظتك بسهولة!</p>
        </header>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg note-edit-card">
                    <div class="card-header text-center">
                        <h3 class="mb-0 text-dark">إضافة ملاحظة 📝</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="noteTitle" class="form-label text-warning">عنوان الملاحظة</label>
                                <input
                                    type="text"
                                    id="noteTitle"
                                    name="title"
                                    class="form-control rounded-pill"
                                    placeholder="أدخل عنوان الملاحظة"
                                    required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="noteBody" class="form-label text-warning">تفاصيل الملاحظة</label>
                                <textarea
                                    id="noteBody"
                                    name="note"
                                    rows="5"
                                    class="form-control rounded"
                                    placeholder="أدخل تفاصيل الملاحظة"
                                    required></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="noteImage" class="form-label text-warning">📸 إضافة صورة (اجباري)</label>
                                <input
                                    type="file"
                                    name="images[]" multiple
                                    class="form-control rounded-pill">
                            </div>

                            <input hidden name="user_id" value="1">

                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning rounded-pill fw-bold">
                                    <i class="fas fa-save"></i> إضافة الملاحظة
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- تحسين التصميم بالـ CSS -->
    <style>
        /* تحسين التصميم العام */
        body {
            background-color: #f9f9f9;
        }

        /* تصميم كرت الإضافة */
        .note-edit-card {
            background-color: #fffbe6;
            border-left: 5px solid #ffcc00;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .note-edit-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #ffcc00;
            color: #333;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* تحسين زر الإضافة */
        .btn-warning {
            background-color: #ffcc00;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-warning:hover {
            background-color: #e6b800;
            transform: scale(1.05);
        }

        /* تحسين الإدخالات */
        .form-control {
            border-radius: 10px;
            border: 1px solid #ffcc00;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</x-bootlayout>
