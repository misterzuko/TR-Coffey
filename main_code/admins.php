<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="admins.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <div class="collapse navbar-collapse ms-5 ps-3 ham-nav" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="admins.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="riwayatadmin.php">Riwayat</a>
                    </li>
                </ul>
            </div>
            <a href="logout.php">
                <button class="btn btn-danger">Keluar</button>
            </a>
        </div>
    </nav>
    <div class="hero">
        <div class="crud">
            <table class="table table-striped-columns">
                <thead>
                    <tr class="text-center fs-4 fw-bold">
                        <th colspan="6">Dashboard Admin</th>
                    </tr>
                    <tr class="text-center">
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Stok Barang</th>
                        <th scope="col">Link Gambar</th>
                        <th scope="col">kelola</th>
                    </tr>
                </thead>
                <tbody>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td>x</td>
                    <td class="text-center">
                        <a href="kelola.php" type="button" class="btn btn-success">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <a href="proses.php?hapus=<?php echo $result['nis'];?>" type="button" class="btn btn-danger" onClick="return confirm('Yakin mau hapus data ini cuy?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="kelola.php">
                <button class="btn btn-primary">Tambah Data</button>
            </a>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.querySelector('.navbar');
        navbar.classList.add('navbar-solid');
        });
    </script>
</body>
</html>