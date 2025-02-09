<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/fav.png') }}">
    <title>Merchant Dashboard Login</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="wrap">
    <div class="parentControl">
        <div class="loginDiv">
            <x-validation-errors class="mb-4 text-danger" />
            <form class="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <h3 class="heading">Merchant Login</h3>
                <input id="email" name="email" class="login-input" placeholder="Enter your email" type="email">
                <input id="password" name="password" class="login-input" placeholder="Enter your password" type="password">
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="options">
                <a href="{{ route('admin.login.form') }}" class="btn btn-sm option-btn-one">Admin</a>
                <a href="{{ route('login') }}" class="btn btn-sm option-btn-two">Merchant</a>
            </div>
        </div>
    </div>
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
