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
    <nav class="navbar navbar-expand-lg navbar-transparent">
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
                <div class="mx-5 px-5">
                    <a href="#menu" class="btn btn-pesan">Pesan Sekarang</a>
                </div>
            </div>
            <div class="col-5 img-fluid mt-3 pt-5">
                <img class="g-kopi" src="../src/bg-img.png" alt="Gambar Kopi">
            </div>
        </div>
    </div>
    <div class="container mb-5 front" id="menu">
        <div class="front-contain">
            <div class="d-flex flex-row justify-content-evenly align-items-center pt-5 frontmenu">
                <?php
                    for($i=1;$i<count($_SESSION['data-kopi'])-3;$i++){
                ?>
                <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/<?php echo $i?>.png" alt="Kopi" class="img-fluid">
                    <h6 class="mt-3 text-center">Coffee <?php echo $_SESSION['data-kopi'][$i]['nama_barang'];?></h6>
                    <p class="text-center">Start From harga-<?php echo $_SESSION['data-kopi'][$i]['harga_barang']; ?></p>
                    <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5" value="<?php $_SESSION['data-kopi'][$i]['nama_barang'];?>">Pesan</button></a>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="../js/user.js"></script>
</body>
</html>
<!-- <div class="d-flex align-items-center justify-content-center mt-2 w-75 tambah-barang">
<button class="btn-icon">
<i class="fa fa-minus-circle fs-4 me-3 cursor-pointer" aria-hidden="true"></i>
</button>
<p class="mb-0">0</p>
<button class="btn-icon">
<i class="fa fa-plus-circle text-primary fs-4 ms-3 cursor-pointer" aria-hidden="true"></i>
</button>
</div> -->
