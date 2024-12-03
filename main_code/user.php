<?php
    session_start();
    $username = $_SESSION['credential']['username'];
    if($_SESSION['data-kopi'][1]['id_barang']==NULL){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeinAja</title>
    <link rel="stylesheet" href="styles.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
        <?php
            if(isset($_SESSION['berhasil'])){
                ?>
                alert('<?php echo $_SESSION['berhasil'];?>');
                <?php
                unset($_SESSION['berhasil']);
            }
        ?>
    </script>
</head>
<body>
    <!-- NAVBAR START -->
    <nav class="navbar navbar-expand-lg navbar-transparent fixed-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="user.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <div class="collapse navbar-collapse ms-5 ps-3 ham-nav" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="user.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="#sosmed">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="ms-5 prof">
                <a href="profile.php" class="text-decoration-none text-light d-flex flex-column align-items-center justify-content-center">
                    <button class="profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </button>
                    <?php echo $username; ?>
                </a>
            </div>
            <div class="hamburger">
                <a href="#" id="ham-bar">
                    <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </nav>
    <!-- NAVBAR END -->
    <!-- SECTION HERO START -->
    <section class="hero">
        <main class="content">
            <h1 class="">Mulai Harimu dengan Secangkir <span>Kopi</span></h1>
            <p class="">Biji kopi pilihan, diambil langsung dari sumbernya.</p>
            <a aria-current="page" href="#menu" class="cta">Pesan Sekarang</a>
        </main>
    </section>
    <!-- SECTION HERO END -->
    <!-- MENU START -->
    <div class="bungkus" id="menu">
        <p class="text-center fw-bold fs-4 c-is">PILIH MENU</p>
        <div class="container text-dark d-flex justify-content-evenly align-items-center pt-5 frontmenu">
            <?php
                for ($i = 1; isset($_SESSION['data-kopi'][$i]['id_barang']); $i++) { ?>
            <form action="menu.php" method="post">
            <div class="d-flex flex-column align-items-center justify-content-evenly p-4 shadow-sm m-3 card-item">
                <img src="../src/<?php echo $i ?>.png" alt="Kopi" class="img-fluid">
                <h6 class="mt-3 text-center fw-bold"><?php echo $_SESSION['data-kopi'][$i]['nama_barang']; ?></h6>
                <p class="text-center">Mulai dari <br> Rp <?php echo $_SESSION['data-kopi'][$i]['harga_barang']; ?></p>
                <?php if($_SESSION['data-kopi'][$i]['stok_barang']>0){ ?>
                    <input type="submit" name="<?php echo $i;?>" value="Pesan" class="btn fw-bold rounded-pill mx-5"></input>
                <?php } else { ?>
                    <input type="button" name="<?php echo $i;?>" value="Habis" class="btn fw-bold rounded-pill mx-5" style="background-color: grey;" onclick="return false;"></input>
                <?php } ?>
            </div>
        </form>
                <?php }
            ?>
        </div>
    </div>
    <!-- MENU END -->
    <!-- SOSMED START -->
    <div class="kemas d-flex justify-content-center align-items-center" id="sosmed">
        <div class="container row g-3 text-dark d-flex justify-content-between align-items-center sosmed-containt">
            <p class="col-md-12 text-center fw-bold fs-4 pb-5 c-us">CONTACT US</p>
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-4 shadow-sm m-3 card-sosmed">
                <img src="../src/pic-ig.png" alt="ig" class="img-fluid">
                <a href="https://www.instagram.com/anr091?igsh=eGljNDM5aHpuZXhv" class="mt-3 fw-bold us-sosmed">@Andreoni</a>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-4 shadow-sm m-3 card-sosmed">
                <img src="../src/pic-ig.png" alt="ig" class="img-fluid">
                <a href="https://www.instagram.com/andreas_s_45?igsh=OW51ZHpjOG1wYnBu" class="mt-3 fw-bold us-sosmed">@Andreas</a>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-4 shadow-sm m-3 card-sosmed">
                <img src="../src/pic-ig.png" alt="ig" class="img-fluid">
                <a href="https://www.instagram.com/mrzzuko_/profilecard/?igsh=MWhwdzF3MTlua2tqbw==" class="mt-3 fw-bold us-sosmed">@Daniro</a>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-4 shadow-sm m-3 card-sosmed">
                <img src="../src/pic-ig.png" alt="ig" class="img-fluid">
                <a href="https://www.instagram.com/rexcyant_/profilecard/?igsh=MWhiY2NramJueGQwaQ==" class="mt-3 fw-bold us-sosmed">@Rexcy</a>
            </div>
        </div>
    </div>
    <!-- SOSMED END -->
    <!-- FOOTER START -->
    <div class="container-expand-lg d-flex justify-content-center align-items-center b-footer">
        <div class="text-center row g-3">
            <a href="#sosmed" class="col-md-6 text-center t-foot text-light">Contact Us</a>
            <a class="col-md-6 text-center t-foot text-light">About kopiinaja</a>
            <p class="col-md-12 t-foot">© 2024 kopiinaja</p>
        </div>
    </div>
    <!-- FOOTER END -->
    <script src="../js/user.js"></script>
</body>
</html>