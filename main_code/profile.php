<?php
    session_start();
    $username = $_SESSION['credential']['username'];
    $email = $_SESSION['credential']['email'];
    if($_SESSION['data-kopi'][1]['id_barang']==NULL){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link rel="stylesheet" href="styles.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/profile.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="user.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <div class="collapse navbar-collapse mx-5 px-3" id="navbarSupportedContent">
                <ul class="navbar-nav ms-5 me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="user.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->
    <!-- PROFILE START -->
    <div class="container mt-5 w-75">
        <div class="row g-3">
            <div class="col-md-6 d-flex justify-content-center align-items-center prof-side">
                <a href="profile.php" class="text-decoration-none text-light d-flex flex-column align-items-center justify-content-center text-center">
                    <button class="profile">
                        <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    </button>
                    <p class="user"><?php echo $username; ?></p>
                </a>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center row g-3">
                <div class="col-md-12 un w-100 mt-5">
                    <label for="un" class="mb-1">Username</label>
                    <p id="un" class="w-75 p-3"><?php echo $username; ?></p>
                </div>
                <div class="col-md-12 email w-100 mb-5">
                    <label for="email" class="mb-1">Email</label>
                    <p id="email" class="w-75 p-3"><?php echo $email; ?></p>
                </div>
                <div class="col-12 mb-5 d-flex justify-content-center align-items-center">
                    <a href="logout.php" class="w-75 ms-5 ps-5">
                        <button type="submit" class="btn-keluar fw-bold py-2 px-4">Keluar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center">
        <table class="table struk">
            <tr>
            <th colspan="11" class="text-center fs-5 pb-2">Riwayat Pembelian</th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>No. Kuitansi</th>
                <th>Jenis Kopi</th>
                <th>Ukuran</th>
                <th>Jenis Penyajian</th>
                <th>Jenis Topping</th>
                <th>Metode Pembayaran</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
        </table>
        </div>
        <!-- <div class="d-flex justify-content-center align-items-center mt-1">
        <input type="button" value="Simpan" class="btn btn-success fw-bold">
        </div> -->
    </div>
    <!-- PROFILE END -->
    <script src="../js/user.js"></script>
</body>
</html>