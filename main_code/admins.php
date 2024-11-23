<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeinAja</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <h3 class="mt-2">Dashboard Admin</h3>
            <a class="btn btn-logout" href="">Logout</a>
        </div>
    </nav>
    <!--Tambah Data-->
    <?php ?>
    <div class="tambah">
        <div class="container-lg d-flex flex-column align-items-center my-3 main">
            <h3>Tambah Menu</h3>
            <div class="upload-container container">
                <form action="admins.php" method="post" class="container d-flex flex-column mt-3">
                    <div class="d-flex flex-column input">
                        <label class="mb-2" for="title">Nama Produk :</label>
                        <input type="text" name="title" id="title" placeholder="Masukan Nama Produk">
                    </div>
                    <div class="d-flex flex-column mt-3 input">
                        <label class="mb-2" for="title">Insert Gambar :</label>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="d-flex flex-column mt-3 input">
                        <label class="mb-2" for="harga">Harga :</label>
                        <input type="number" name="harga" id="harga" placeholder="Masukan Harga">
                    </div>
                    <div class="upload mt-3">
                        <input type="submit" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php ?>
    <!--Edit Data-->
    <?php ?>
    <div class="edit">
        <div class="container-lg d-flex flex-column align-items-center my-3 main">
            <h3>Edit Menu</h3>
            <div class="upload-container container">
                <form action="admins.php" method="post" class="container d-flex flex-column mt-3">
                    <div class="d-flex flex-column input">
                        <label class="mb-2" for="title">Nama Produk :</label>
                        <input type="text" name="title" id="title" placeholder="Masukan Nama Produk">
                    </div>
                    <div class="d-flex flex-column mt-3 input">
                        <label class="mb-2" for="title">Insert Gambar :</label>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="d-flex flex-column mt-3 input">
                        <label class="mb-2" for="harga">Harga :</label>
                        <input type="number" name="harga" id="harga" placeholder="Masukan Harga">
                    </div>
                    <div class="upload mt-3">
                        <input type="submit" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php ?>

    <div class="d-flex my-4 data">
        <div class="container">
            <h3>Data</h3>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th class="">ID</th>
                        <th class="">Nama Produk</th>
                        <th class="">Gambar</th>
                        <th class="">Harga</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['gambar'] ?></td>
                        <td><?= $row['harga'] ?></td>
                        <td><a href="admins?edit=1"><img src=""></a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2</td>
                        <td>3fs</td>
                        <td>fesfe</td>
                        <td>fes</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>