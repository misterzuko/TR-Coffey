<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        <?php   
        if(isset($_GET['errorlog'])){
        ?>  
        alert("Password atau akun yang anda masukan salah, tolong coba lagi!");
        <?php
        } elseif(isset($_GET['regdon'])){
        ?>
        alert("Akun berhasil dibuat!");
        <?php
        }
        ?>
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container row">
        <div class="col-6 d-flex flex-column justify-content-center align-items-center">
            <div class="brand text-center">
                <a class="navbar-brand Brand" href="#">
                    <i class="fa fa-coffee fa-5x mb-2" aria-hidden="true"></i>
                    <p class="fs-1 fw-bold m-0">CoffeinAja</p>
                </a>
            </div>
            <div class="descript mt-3 text-light ms-5 ps-5">
                <h3 class="fs-4 fw-normal">
                    Kopi full kafein <br>
                    <span class="fw-bold">yo sudah pasti gak aman di lambung</span>
                </h3>
            </div>
        </div>
        <div class="container col-6 border border-4 d-flex justify-content-center align-items-center containt">
            <form class="form-container" action="process.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="inputPassword6" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPassword6" class="form-control border-secondary" name="pw" aria-describedby="passwordHelpInline">
                        <button type="button" class="btn border border-light bg-secondary" id="togglePassword">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary w-100 fw-bold fs-5">Submit</button>
                </div>
                <div class="mt-3 text-center">
                    <a href="signup.php">
                        <button type="button" class="btn btn-success w-100 fw-bold fs-5">Create account</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('inputPassword6');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        });
    </script>
</body>

</html>