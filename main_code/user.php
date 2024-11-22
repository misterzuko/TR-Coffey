<?php
    session_start();
    $username = $_SESSION['credential']['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeinAja</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
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
                        <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
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
    <div class="container text-light mt-3">
        <div class="row">
            <div class="col-7 mt-5 pt-5 frontlook">
                <h2 class="mx-5 px-5">Salatiga</h2>
                <h1 class="mx-5 px-5">Coffe Numerouno</h1>
                <p class="mx-5 px-5 pt-2">Kopi no kafein ril no vake cuy. Ngerusak lambung, Harus Beli, Wajib!</p>
                <div class="mx-5 px-1">
                    <a href="#menu"><button class="btn fw-bold rounded-pill mx-5 b-beli">Pesan Sekarang</button></a>
                </div>
            </div>
            <div class="col-5 img-fluid mt-3 pt-5">
                <img class="g-kopi" src="../src/background.png" alt="Gambar Kopi">
            </div>
        </div>
    </div>
    <div class="container mb-5 front" id="menu">
        <div class="front-contain">
            <div class="d-flex flex-row justify-content-evenly align-items-center pt-5 frontmenu">
                <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/1.png" alt="Kopi-4" class="img-fluid">
                    <h6 class="mt-3 text-center">Coffea Arabica</h6>
                    <p class="text-center">Start From harga-x</p>
                    <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5">Pesan</button></a>
                </div>
                <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/2.png" alt="">
                    <h6 class="mt-3">Robusta</h6>
                    <p class="text-center">Start From harga-x</p>
                    <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5">Pesan</button></a>
                </div>
                <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/3.png" alt="">
                    <h6 class="mt-3">Liberika</h6>
                    <p class="text-center">Start From harga-x</p>
                    <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5">Pesan</button></a>
                </div>
                <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/4.png" alt="">
                    <h6 class="mt-3">Kopi Luwak</h6>
                    <p class="text-center">Start From harga-x</p>
                    <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5">Pesan</button></a>
                </div>
                <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/5.png" alt="">
                    <h6 class="mt-3">Kopi Tubruk</h6>
                    <p class="text-center">Start From harga-x</p>
                    <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5">Pesan</button></a>
                </div>
                <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/6.png" alt="">
                    <h6 class="mt-3">Macchiato</h6>
                    <p class="text-center">Start From harga-x</p>
                    <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5">Pesan</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/user.js"></script>
</body>
</html>