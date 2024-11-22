<?php
    session_start();
    $username = $_SESSION['credential']['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fs-6 fw-bold Brand row" href="user.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2">CoffeinAja</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-5 px-3" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="user.php">Home</a>
                    </li>
                </ul>
                <div class="ms-5">
                    <a href="" class="text-decoration-none text-light d-flex flex-column align-items-center justify-content-center">
                        <button class="profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </button>
                        <?php echo $username; ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <table class="table table-secondary w-50 text-center">
            <thead>
                <tr class="text-center">
                    <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex flex-column align-items-center justify-content-center p-4 card-menu">
                            <img src="../src/5.png" alt="Kopi-4" class="img-fluid img-menu">
                            <h6 class="mt-3 text-center">Coffea Arabica</h6>
                            <p class="text-center">harga-x</p>
                            <div class="d-flex align-items-center justify-content-center mt-2 tambah-barang">
                                <button class="btn-icon">
                                    <i class="fa fa-minus-circle fs-4 me-3 cursor-pointer" aria-hidden="true"></i>
                                </button>
                                <p class="mb-0">0</p>
                                <button class="btn-icon">
                                    <i class="fa fa-plus-circle text-primary fs-4 ms-3 cursor-pointer" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12 row g-3">
                                <div class="col-md-6 d-flex align-items-center justify-content-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <p class="fw-bold">Hot</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <p class="fw-bold">Ice</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row g-3 d-flex align-items-center justify-content-center">
                                <div class="col-md-6 d-flex align-items-center justify-content-center">
                                    <div class="container">
                                        <label for="validationCustom04" class="form-label fw-bold">Pilih Topping</label>
                                        <select class="form-select w-50" id="validationCustom04" required>
                                            <option selected value="">Topping-1</option>
                                            <option>Topping-2</option>
                                            <option>Topping-3</option>
                                            <option>Topping-4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-center justify-content-start">
                                    <div class="container">
                                        <label for="validationCustom03" class="form-label fw-bold">Jumlah Topping</label>
                                        <input type="number" class="form-control w-50" id="validationCustom03" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row g-3">
                                <div class="col-md-4 d-flex align-items-center justify-content-end">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <p class="fw-bold">Reguler</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <p class="fw-bold">Medium</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center justify-content-start">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            <p class="fw-bold">Large</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p id="harga" class="fw-bold">Harga: Rp </p>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success fw-bold fs-5 w-25" type="submit">Beli</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>