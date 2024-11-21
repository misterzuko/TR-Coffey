<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<title>Daftar Menu Coffe</title>
<link rel="stylesheet" href="pesanan.css">
<a class="navbar-brand fs-6 fw-bold Brand" href="#">
                <i class="fa fa-coffee" aria-hidden="true"></i></i>
                CoffeinAja
            </a>   
<body> 
<div class="container">
    <br>
    <h4 class="text-center">Daftar Menu</h4>
    <?php
    include "koneksi.php";

    if (isset($_GET['id_barang'])) {
        $id_barang = htmlspecialchars($_GET["id_barang"]);

        $sql = "DELETE FROM tb_barang WHERE id_barang = '$id_barang'";
        $hasil = mysqli_query($kon, $sql);

        if ($hasil) {
            header("Location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
        }
    }
    ?>
    <table class="table table-bordered">
        
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Stok</th>
            <th colspan="2">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM tb_barang ORDER BY id_barang DESC";
        $hasil = mysqli_query($kon, $sql);
        $no = 1;
        while ($data = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $data['nama_barang'] . "</td>";
            echo "<td>" . $data['harga_barang'] . "</td>";
            echo "<td>" . $data['stok_barang'] . "</td>";
            echo "<td>
                <a href='update.php?id_barang=" . $data['id_barang'] . "' class='btn btn-warning'> Edit</a>
                <a href='index.php?id_barang=" . $data['id_barang'] . "' class='btn btn-danger'>Hapus</a>
                </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table><div class="container">
    <a href="pemesanan.php" class="btn btn-success my-2">Menu Pemesanan</a>
    <a href="daftar_transaksi.php" class="btn btn-info my-2">Daftar Transaksi</a>
    <a href="create.php" class="btn btn-primary">Tambah Menu</a>
</div>
</div>
</body>
</html>
