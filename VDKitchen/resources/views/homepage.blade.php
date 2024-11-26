<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VDKitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="text-center mb-4">
            <h1>Viriya Dewi Kitchen</h1>
            <p>Buka hari Selasa-Minggu, 06:00-14:00</p>
            <button class="btn btn-primary">Maps Location</button>
        </div>

        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="#">Makanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Minuman</a>
            </li>
        </ul>

        <div class="row">
            @foreach ($menus as $menu)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset($menu['image']) }}" class="card-img-top" alt="{{ $menu['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu['name'] }}</h5>
                        <p class="card-text">{{ $menu['price'] }}</p>
                        <button class="btn btn-primary">Order Now</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
