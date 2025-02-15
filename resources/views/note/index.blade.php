<x-bootlayout>
    <div class="container mt-5">
        <!-- عنوان الموقع -->
        <header class="text-center mb-4">
            <h1 class="fw-bold text-primary">📝 My Notes</h1>
            <p class="text-muted">احتفظ بأفكارك وملاحظاتك في مكان واحد</p>
        </header>

        <div class="row">
            @foreach ($notes as $note)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded-lg note-card">
                        <div class="card-header text-white text-center">
                            <h5 class="card-title mb-0">{{ $note->title }}</h5>
                        </div>
                        <div class="card-body p-4">
                            <p class="note-text">{{ $note->note }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-around bg-light">
                            <a href="{{ route('note.show', $note) }}" class="btn btn-primary btn-sm">عرض</a>
                            <a href="{{ route('note.edit', $note) }}" class="btn btn-success btn-sm">تعديل</a>
                            <form action="{{ route('note.destroy', $note) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- زر إضافة ملاحظة -->
    <a href="{{ route('note.create') }}" class="btn-add" data-bs-toggle="tooltip" title="إضافة ملاحظة جديدة">
        <i class="bi bi-plus-lg"></i>
    </a>

    <!-- تحسين التصميم بالـ CSS -->
    <style>
        /* خلفية الصفحة */
        body {
            background-color: #f7f7f7;
        }

        /* تصميم البطاقات */
        .note-card {
            background-color: #fffbe6;
            border-left: 5px solid #ffcc00;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .note-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: #ffcc00;
            color: #333;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .note-text {
            font-style: italic;
            color: #555;
        }

        /* زر الإضافة */
        .btn-add {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 70px;
            height: 70px;
            background-color: #ffcc00;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-size: 28px;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-add:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        /* تأثير نبض حول الزر */
        .btn-add::after {
            content: '';
            position: absolute;
            width: 90px;
            height: 90px;
            border: 2px solid rgba(255, 204, 0, 0.5);
            border-radius: 50%;
            animation: pulse 1.5s infinite;
            z-index: -1;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(1.5);
                opacity: 0;
            }
        }
    </style>

    <!-- تحسين تجربة المستخدم بالـ JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
</x-bootlayout>
