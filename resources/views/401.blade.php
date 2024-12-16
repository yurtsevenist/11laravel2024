<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 Unauthorized</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }
        .error-container {
            text-align: center;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .error-code {
            font-size: 6rem;
            font-weight: bold;
            color: #dc3545;
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #6c757d;
        }
        .btn-home, .btn-login {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">401</div>
        <div class="error-message">Unauthorized Access</div>
        <p class="text-muted">Sorry, you don't have permission to access this page.</p>
        <div>
            <a href="{{route('/')}}" class="btn btn-primary btn-home">Go to Home</a>
            <a href="{{route('login')}}" class="btn btn-outline-secondary btn-login">Login</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
