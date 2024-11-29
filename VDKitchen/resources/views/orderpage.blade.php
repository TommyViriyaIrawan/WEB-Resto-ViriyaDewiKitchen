<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Checkout</h1>
        <form action="{{ route('placeOrder') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="orderType" class="form-label">Order Type</label>
                <select name="order_type" id="orderType" class="form-select" required>
                    <option value="Dine In">Dine In</option>
                    <option value="Pick Up">Pick Up</option>
                </select>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item['subtotal'], 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mb-3">
                <h3>Total: Rp{{ number_format($totalPrice, 0, ',', '.') }}</h3>
                <input type="hidden" name="total_price" value="{{ $totalPrice }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Place Order</button>
        </form>
    </div>
</body>
</html>
