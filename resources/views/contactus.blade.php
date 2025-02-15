<x-bootlayout title="Contact Us">

    <style>
        /* نمط الجسم */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        /* نمط العنوان */
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* نمط التنبيه */
        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        /* نمط نموذج الاتصال */
        .form-group {
            margin-bottom: 15px;
        }

        /* نمط حقول الإدخال */
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* نمط الزر */
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

    <h1>Contact US</h1>

    @if (session('success'))
        <div id="flash-message" class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
            // جعل الرسالة تختفي بعد 5 ثوانٍ
            setTimeout(() => {
                const message = document.getElementById('flash-message');
                if (message) {
                    message.style.transition = 'opacity 0.5s ease';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500); // حذف الرسالة تمامًا
                }
            }, 5000); // 5000 = 5 ثوانٍ
        </script>
    @endif

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
         <div>
            <label for="age">Age:</label>
            <input type="age" name="age" id="age" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

</x-bootlayout>
