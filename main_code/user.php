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
    <link rel="stylesheet" href="styles.css?v=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent fixed-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fs-6 fw-bold Brand row" href="user.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-5 px-3" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                    <li class="nav-item pb-2">
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
    <section class="hero">
        <main class="content">
            <h1 class="">Mulai Harimu dengan Secangkir <span>Kopi</span></h1>
            <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            <a href="#menu" class="cta">Pesan Sekarang</a>
        </main>
    </section>
    <div class="container mb-5 front" id="menu">
        <div class="front-contain text-dark">
            <div class="d-flex flex-row flex-wrap justify-content-evenly align-items-center pt-5 frontmenu">
                <?php
                    for($i=1;$i<count($_SESSION['data-kopi'])-3;$i++){
                ?>
                <div class="bg-light d-flex flex-shrink-1 flex-column align-items-center justify-content-center p-4 shadow-sm">
                    <img src="../src/<?php echo $i?>.png" alt="Kopi" class="img-fluid">
                    <h6 class="mt-3 text-center"><?php echo $_SESSION['data-kopi'][$i]['nama_barang'];?></h6>
                    <p class="text-center">Mulai dari <br> Rp <?php echo $_SESSION['data-kopi'][$i]['harga_barang']; ?></p>
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