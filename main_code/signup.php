<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        <?php
        session_start();
        if(isset($_SESSION['dahada'])){
        ?>  
        alert("Akun yang anda masukan sudah terdaftar, mohon masukan email yang berbeda!");
        <?php
        session_destroy();
        }
        ?>
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeinAja: masuk atau daftar</title>
    <link rel="stylesheet" href="styles.css?v=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center brandlog">
            <div class="brand text-center">
                <a class="navbar-brand Brand" href="#">
                    <i class="fa fa-coffee fa-5x mb-2" aria-hidden="true"></i>
                    <p class="fs-1 fw-bold m-0"><span>kopi</span>inaja</p>
                </a>
            </div>
        </div>
        <div class="container d-flex justify-content-center align-items-center containt">
            <form class="form-container" action="process.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div class="mb-3">
                    <label for="inputPassword6" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPassword6" class="form-control border-light" name="pw" aria-describedby="passwordHelpInline">
                        <button type="button" class="b-eye" id="togglePassword">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary text-light w-50 fw-bold fs-5" name="register">Daftar</button>
                </div>
                <h5 class="text-center mt-3">atau</h5>
                <div class="text-center">
                    <a href="login.php" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover fs-5">Punya akun?</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/signup.js"></script>
</body>
</html>