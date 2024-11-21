<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php"; // Menghubungkan ke database

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_barang = input($_POST["nama_barang"]);
        $harga_barang = input($_POST["harga_barang"]);
        $stok_barang = input($_POST["stok_barang"]);

        // Query untuk menambahkan data ke database
        $sql = "INSERT INTO tb_barang (nama_barang, harga_barang, stok_barang) VALUES ('$nama_barang', '$harga_barang', '$stok_barang')";
        $hasil = mysqli_query($kon, $sql);

        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Data gagal disimpan.</div>";
        }
    }
    ?>
    <h2>Tambah Menu Baru</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama menu" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga_barang" class="form-control" placeholder="Masukkan harga" required>
        </div>
        <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" name="stok_barang" class="form-control" placeholder="Masukkan stok" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
