<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    if(isset($_SESSION['gagal'])){
        ?>
        <script>
            alert("EMAIL ATAU PASSWORD YANG ANDA MASUKAN SALAH!");
        </script>
        <?php
        session_destroy();
        }
    if(isset($_SESSION['berhasil'])){
        ?>
        <script>
            alert("Akun berhasil dibuat!");
        </script>
        <?php
        session_destroy();
        }
        ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeinAja: masuk atau daftar</title>
    <link rel="stylesheet" href="styles.css?v=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container row">
        <div class="col-6 d-flex flex-column justify-content-center align-items-center brandlog">
            <div class="brand text-center">
                <a class="navbar-brand Brand" href="#">
                    <i class="fa fa-coffee fa-5x mb-0" aria-hidden="true"></i>
                    <p class="fs-1 fw-bold m-0">CoffeinAja</p>
                </a>
            </div>
            <div class="descript mt-3">
                <p class="fs-5 fw-normal">
                    Secangkir Kehangatan, Sejuta Cerita
                </p>
            </div>
        </div>
        <div class="container col-6 d-flex justify-content-center align-items-center containt">
            <form class="form-container" action="process.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="inputPassword6" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPassword6" class="form-control border-light" name="pw" aria-describedby="passwordHelpInline">
                        <button type="button" class="btn b-eye" id="togglePassword">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary w-100 fw-bold fs-5">Masuk</button>
                </div>
                <div class="container d-flex justify-content-center align-items-center garis w-100 mt-4 mb-4">
                    <p></p>
                </div>
                <div class="text-center">
                    <a href="signup.php">
                        <button type="button" class="btn btn-success w-50 fw-bold fs-5">Buat akun</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>