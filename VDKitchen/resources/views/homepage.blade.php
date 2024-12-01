<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VDKitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .add-btn {
            width: 100%;
            height: 40px;
            font-size: 16px;
            margin-top: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-group-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container {
            padding-bottom: 80px; /* Tambahkan ruang di bawah kontainer */
            }

        .cart-button {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-button button {
            border: none;
            transition: background-color 0.3s;
        }

        .cart-button button:hover {
            background-color: #f0f0f0;
        }

        .minus-btn,
        .plus-btn {
            border: 1px solid #ddd;
            background-color: #f8f9fa;
            color: #333;
            font-size: 16px;
            font-weight: bold;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .minus-btn:hover,
        .plus-btn:hover {
            background-color: #e2e6ea;
        }

        .quantity-display {
            margin: 0 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }

        .card {
            height: 100%; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: stretch;
            text-align: center;
        }

        .card img {
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 1; 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1rem;
            font-weight: bold;
            min-height: 45px;
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
            min-height: 20px; 
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1050;
        }

        .modal-dialog {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            border-bottom: 1px solid #ddd;
            padding: 15px;
        }

        .modal-body {
            padding: 30px;
        }

        .btn-close {
            background: red;
            border: none;
            font-size: 1.5rem;
            line-height: 1;
            color: black;
            cursor: pointer;
            padding: 0.2rem 0.5rem;
            border-radius: 0.25rem;
            text-align: center;
        }

        .btn-close:hover {
            background: darkred;
            color: white;
        }

        .border {
            border: 1px solid #ddd;
            background-color: #f8f9fa;
        }
        .rounded {
            border-radius: 8px;
        }
        .fw-bold {
            font-weight: bold;
        }
        .cart-button {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-button button {
            border: none;
            transition: background-color 0.3s;
        }

        .cart-button button:hover {
            background-color: #f0f0f0;
        }
    </style>

</head>
<body>
    <!-- Tombol Navigasi di Header -->
    <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
        <!-- Tombol Panah Kembali -->
        <button class="btn btn-light border rounded-circle" onclick="window.location.href='<?= route('welcome') ?>'">
            &#8592;
        </button>


        <!-- Tombol Garis Tiga -->
        <button class="btn btn-light border rounded-circle" onclick="toggleMenuModal()">
            ☰
        </button>
    </div>

    <!-- Input Pencarian -->
    <div id="searchBar" class="d-none p-3">
        <input type="text" class="form-control" placeholder="Cari menu..." />
    </div>

    <!-- Modal Menu -->
    <div id="menuModal" class="modal" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Menu</h5>
                    <button type="button" class="btn-close" onclick="toggleMenuModal()">X</button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/order-history">Order History</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/welcome">Login</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/privacy-policy">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Informasi User/Guest -->
        <div class="text-center mb-4">
            @if ($isGuest)
                <h1>Welcome, Guest!</h1>
            @elseif ($user)
                <h1>Welcome, {{ $user->name }}!</h1>
            @else
                <h1>Welcome to Viriya Dewi Kitchen!</h1>
            @endif
            <p>Buka hari Selasa-Minggu, 06:00-14:00</p>
            <button class="btn btn-primary" onclick="window.location.href='https://maps.app.goo.gl/DS1fis8M14kJNy9s8'">Maps Location</button>
        </div>

        
        <!-- Order Type Section -->
        <!-- Grouped Order Type Section -->
        <div class="d-flex align-items-center justify-content-between p-3 border rounded mb-4">
            <span class="fw-bold">Order Type</span>
            <button id="orderTypeBtn" class="btn btn-outline-secondary dropdown-toggle">Pick Up</button>
        </div>


        <!-- Modal for Order Type -->
        <div id="orderTypeModal" class="modal" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select Order Type</h5>
                        <button type="button" class="btn-close" id="closeModal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body text-center">
                        <button id="dineInBtn" class="btn btn-primary m-2">Dine In</button>
                        <button id="pickUpBtn" class="btn btn-primary m-2">Pick Up</button>
                    </div>
                </div>
            </div>
        </div>


        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#foods">Makanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#drinks">Minuman</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Daftar Makanan -->
            <div class="tab-pane fade show active" id="foods">
                <div class="row">
                    @foreach ($foods as $food)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/' . $food['image']) }}" class="card-img-top" alt="{{ $food['name'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $food['name'] }}</h5>
                                    <p class="card-text">Rp{{ number_format($food['price'], 0, ',', '.') }}</p>
                                    <button class="btn btn-primary add-btn" data-price="{{ $food['price'] }}">Add</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Daftar Minuman -->
            <div class="tab-pane fade" id="drinks">
                <div class="row">
                    @foreach ($drinks as $drink)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/' . $drink['image']) }}" class="card-img-top" alt="{{ $drink['name'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $drink['name'] }}</h5>
                                    <p class="card-text">Rp{{ number_format($drink['price'], 0, ',', '.') }}</p>
                                    <button class="btn btn-primary add-btn" data-price="{{ $drink['price'] }}">Add</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- Floating Checkout -->
        <div id="floating-checkout" class="cart-button bg-primary text-white p-3 text-center">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span>Total</span>
                    <p class="fw-bold mb-0">Rp<span id="cart-total">0</span></p>
                </div>
                <button class="btn btn-light text-primary fw-bold rounded-pill px-4 py-2" onclick="window.location.href='/checkout'">
                    CHECK OUT (<span id="item-count">0</span>)
                </button>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleMenuModal() {
            const menuModal = document.getElementById("menuModal");
            if (menuModal.style.display === "none") {
                menuModal.style.display = "flex";
            } else {
                menuModal.style.display = "none";
            }
        }
        
        document.addEventListener('DOMContentLoaded', function () {
            // Modal handling
            const orderTypeBtn = document.getElementById('orderTypeBtn');
            const orderTypeModal = document.getElementById('orderTypeModal');
            const closeModal = document.getElementById('closeModal');
            const dineInBtn = document.getElementById('dineInBtn');
            const pickUpBtn = document.getElementById('pickUpBtn');

            // Open modal when "Order Type" button is clicked
            orderTypeBtn.addEventListener('click', function () {
                orderTypeModal.style.display = 'flex'; // Show modal
            });

            // Close modal when "X" button is clicked
            closeModal.addEventListener('click', function () {
                orderTypeModal.style.display = 'none'; // Hide modal
            });

            // Handle Dine In selection
            dineInBtn.addEventListener('click', function () {
                orderTypeBtn.textContent = 'Dine In'; // Update button text
                orderTypeModal.style.display = 'none'; // Hide modal
            });

            // Handle Pick Up selection
            pickUpBtn.addEventListener('click', function () {
                orderTypeBtn.textContent = 'Pick Up'; // Update button text
                orderTypeModal.style.display = 'none'; // Hide modal
            });

            // Close modal when clicking outside the modal content
            orderTypeModal.addEventListener('click', function (e) {
                if (e.target === orderTypeModal) {
                    orderTypeModal.style.display = 'none';
                }
            });

            // Floating cart logic (unchanged)
            const buttons = document.querySelectorAll('.add-btn');
            const itemCount = document.getElementById('item-count');
            const cartTotal = document.getElementById('cart-total');
            let totalItems = 0;
            let totalPrice = 0;

            const updateCart = () => {
                itemCount.textContent = totalItems;
                cartTotal.textContent = totalPrice.toLocaleString('id-ID');
            };

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    if (!button.classList.contains('added')) {
                        button.classList.add('added');
                        button.innerHTML = `
                            <div class="btn-group-container">
                                <button class="minus-btn">-</button>
                                <span class="quantity-display">1</span>
                                <button class="plus-btn">+</button>
                            </div>
                        `;

                        const minusBtn = button.querySelector('.minus-btn');
                        const plusBtn = button.querySelector('.plus-btn');
                        const quantityDisplay = button.querySelector('.quantity-display');
                        let quantity = 1;

                        totalItems++;
                        totalPrice += parseInt(button.dataset.price);
                        updateCart();

                        minusBtn.addEventListener('click', () => {
                            quantity--;
                            if (quantity > 0) {
                                quantityDisplay.textContent = quantity;
                                totalItems--;
                                totalPrice -= parseInt(button.dataset.price);
                                updateCart();
                            } else {
                                button.classList.remove('added');
                                button.innerHTML = 'Add';
                                totalItems--;
                                totalPrice -= parseInt(button.dataset.price);
                                updateCart();
                            }
                        });

                        plusBtn.addEventListener('click', () => {
                            quantity++;
                            quantityDisplay.textContent = quantity;
                            totalItems++;
                            totalPrice += parseInt(button.dataset.price);
                            updateCart();
                        });
                    }
                });
            });
        });
    </script>




</body>
</html>
