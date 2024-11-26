<?php
    session_start();
    $username = $_SESSION['credential']['username'];
    $email = $_SESSION['credential']['email'];
    if($_SESSION['data-kopi'][1]['id_barang']==NULL){
        header('location: login.php');
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
                <div class="col-md-12 un w-100">
                    <label for="un">Username</label>
                    <p id="un" class="w-50 text-center"><?php echo $username; ?></p>
                </div>
                <div class="col-md-12 email w-100">
                    <label for="email">Email</label>
                    <p id="email" class="w-75 text-center"><?php echo $email; ?></p>
                </div>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-center align-items-center">
                <a href="logout.php">
                    <button type="submit" class="btn btn-danger fw-bold p-2">Keluar</button>
                </a>
            </div>
        </div>
    </div>
    <!-- PROFILE END -->
</body>
</html>