<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<title>Daftar Menu Coffe</title>
<body> 
    <h3 class="mt-2">Dashboard Admin</h3>
    <a class="btn btn-logout" href="">Logout</a>  
    <a class="navbar-brand fs-6 fw-bold Brand" href="#">
        <i class="fa fa-coffee coffee-icon" aria-hidden="true"></i>
        CoffeinAja
    </a>  
<div class="container">
    <br>
    <h4 class="text-center">DAFTAR MENU</h4>
    <?php
    include "connect.php";
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
            <th>Aksi</th>
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
            echo "<td><a href='index.php?id_barang=".$data[id_barang]."'Hapus</a></td>";
            echo "<td><a href='index.php?id_barang=".$data[id_barang]."'Edit</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table><div class="container">
</div>
</div>
</body>
</html>
