<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-box {
            background-color: #e6ffed;
            color: #2d6a4f;
            padding: 20px 40px;
            border: 1px solid #95d5b2;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            visibility: visible; /* Initial visibility */
            opacity: 1; /* Fully visible */
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }
        .message-box h1 {
            margin: 0;
            font-size: 24px;
        }
        .message-box p {
            margin: 10px 0 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="message-box" id="message-box">
        <h1>Email Was Sent Successfully</h1>
        <p>Thank you for your message. We will get back to you shortly.</p>
    </div>

    <script>
        // Show the message for 3 seconds and then hide it
        setTimeout(function() {
            const messageBox = document.getElementById('message-box');
            messageBox.style.visibility = 'hidden';
            messageBox.style.opacity = 0;
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
</body>
</html>
