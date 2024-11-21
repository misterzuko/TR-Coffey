<!DOCTYPE html>
<html lang="en">

<head>
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
        <div class="col-6 d-flex flex-column justify-content-center align-items-center text-center">
            <div class="brand">
                <a class="navbar-brand Brand" href="#">
                    <i class="fa fa-coffee fa-5x mb-2" aria-hidden="true"></i>
                    <p class="fs-1 fw-bold m-0">CoffeinAja</p>
                </a>
            </div>
            <div class="descript mt-3">
                <h3 class="fs-4 fw-normal">
                    Kopi full kafein <br>
                    <span class="fw-bold">yo sudah pasti gak aman di lambung</span>
                </h3>
            </div>
        </div>
        <div class="container col-6 border border-4 d-flex justify-content-center align-items-center containt">
            <form class="form-container" action="user.php" method="POST">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="inputPassword6" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" id="inputPassword6" class="form-control border-secondary" aria-describedby="passwordHelpInline">
                        <button type="button" class="btn border border-secondary" id="togglePassword">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
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