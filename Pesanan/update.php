<!DOCTYPE html>
<html>
<head>
    <title>Update Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php
    include "koneksi.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id_barang'])) {
        $id_barang = input($_GET["id_barang"]);

        $sql = "SELECT * FROM tb_barang WHERE id_barang = $id_barang";
        $hasil = mysqli_query($kon, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_barang = input($_POST["id_barang"]);
        $nama_barang = input($_POST["nama_barang"]);
        $harga_barang = input($_POST["harga_barang"]);
        $stok_barang = input($_POST["stok_barang"]);

        $sql = "UPDATE tb_barang SET 
                nama_barang = '$nama_barang',
                harga_barang = '$harga_barang',
                stok_barang = '$stok_barang'
                WHERE id_barang = $id_barang";

        $hasil = mysqli_query($kon, $sql);

        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Data gagal diupdate.</div>";
        }
    }
    ?>
    <h2>Update Menu</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
        <div class="form-group">
            <label>Nama Menu</label>
            <input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga_barang" class="form-control" value="<?php echo $data['harga_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" name="stok_barang" class="form-control" value="<?php echo $data['stok_barang']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
