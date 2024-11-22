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
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <table class="table table-secondary w-50">
        <thead>
            <tr>
                <th scope="col">Menu</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 shadow-sm">
                        <img src="../src/5.png" alt="Kopi-4" class="img-fluid img-menu">
                        <h6 class="mt-3 text-center">Coffea Arabica</h6>
                        <p class="text-center">Start From harga-x</p>
                        <a href="menu.php"><button class="btn-primary btn fw-bold rounded-pill mx-5">Pesan</button></a>
                    </div>
                </td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>