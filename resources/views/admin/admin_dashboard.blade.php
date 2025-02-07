<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Merchant List</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary w-100" data-bs-theme="dark">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="#">Merchant Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

            </ul>
        </div>
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="wrap">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 position">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Merchant Name</th>
                        <th>Merchant Email</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($merchants as $merchant)
                    <tr>
                        <td>{{ $merchant->name }}</td>
                        <td>{{ $merchant->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
