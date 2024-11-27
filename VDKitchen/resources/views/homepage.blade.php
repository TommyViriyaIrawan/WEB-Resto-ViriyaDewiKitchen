<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VDKitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Konsistensi ukuran tombol "Add" */
        .add-btn {
            width: 100%; /* Tombol penuh lebar */
            height: 40px; /* Tinggi tetap */
            font-size: 16px;
            margin-top: auto; /* Tombol tetap di bawah */
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-group-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        /* Konsistensi ukuran kotak menu */
        .card {
            height: 100%; /* Membuat semua kartu memiliki tinggi seragam */
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
            flex-grow: 1; /* Membuat isi kartu mengisi ruang yang tersedia */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1rem;
            font-weight: bold;
            min-height: 45px; /* Atur tinggi minimum untuk mencegah perbedaan ukuran */
        }

        .card-text {
            font-size: 0.9rem;
            color: #555;
            min-height: 20px; /* Konsistensi untuk harga makanan */
        }

        /* Modal Pop-Up Styling */
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

        /* Styling for Order Type Group */
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
    </style>

</head>
<body>
    <div class="container mt-4">
        <div class="text-center mb-4">
            <h1>Viriya Dewi Kitchen</h1>
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
            <!-- Tab Makanan -->
        <div class="tab-pane fade show active" id="foods">
            <div class="row">
                @foreach ($foods as $food)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset($food['image']) }}" class="card-img-top" alt="{{ $food['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $food['name'] }}</h5>
                            <p class="card-text">{{ $food['price'] }}</p>
                            <button class="btn btn-primary add-btn">Add</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tab Minuman -->
        <div class="tab-pane fade" id="drinks">
            <div class="row">
                @foreach ($drinks as $drink)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset($drink['image']) }}" class="card-img-top" alt="{{ $drink['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $drink['name'] }}</h5>
                            <p class="card-text">{{ $drink['price'] }}</p>
                            <button class="btn btn-primary add-btn">Add</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.add-btn');

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

                        // Event untuk tombol minus
                        minusBtn.addEventListener('click', () => {
                            if (quantity >= 1) { // Jika quantity lebih besar dari 1
                                quantity--;
                                quantityDisplay.textContent = quantity;
                            } else if (quantity < 1) { // Jika quantity adalah 1
                                // Kembali ke tombol "Add" jika quantity == 1
                                button.classList.remove('added');
                                button.innerHTML = 'Add';
                            }
                        });


                        // Event untuk tombol plus
                        plusBtn.addEventListener('click', () => {
                            quantity++;
                            quantityDisplay.textContent = quantity;
                        });
                    }
                });
            });

            // Script untuk modal Order Type
            const orderTypeBtn = document.getElementById('orderTypeBtn');
            const orderTypeModal = document.getElementById('orderTypeModal');
            const closeModal = document.getElementById('closeModal');
            const dineInBtn = document.getElementById('dineInBtn');
            const pickUpBtn = document.getElementById('pickUpBtn');

            orderTypeBtn.addEventListener('click', function () {
                orderTypeModal.style.display = 'flex';
            });

            closeModal.addEventListener('click', function () {
                orderTypeModal.style.display = 'none';
            });

            dineInBtn.addEventListener('click', function () {
                orderTypeBtn.textContent = 'Dine In';
                orderTypeModal.style.display = 'none';
            });

            pickUpBtn.addEventListener('click', function () {
                orderTypeBtn.textContent = 'Pick Up';
                orderTypeModal.style.display = 'none';
            });
        });
    </script>



</body>
</html>
