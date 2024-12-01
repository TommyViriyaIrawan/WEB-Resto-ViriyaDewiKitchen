<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Viriya Dewi Kitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 400px;
            text-align: center;
        }
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Welcome to Viriya Dewi Kitchen</h1>
        <p>Order your favorite meals easily!</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary mx-2">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-success mx-2">Sign Up</a>
            <form action="{{ route('guest.order') }}" method="GET" style="display: inline;">
                <button type="submit" class="btn btn-secondary mx-2">Order as Guest</button>
            </form>
        </div>
    </div>
</body>
</html>
