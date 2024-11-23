<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu Coffee</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fa fa-coffee coffee-icon" aria-hidden="true"></i> CoffeinAja
            </a>
            <a class="btn btn-danger btn-sm" href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="text-center">Dashboard Admin</h3>

        <?php
        // Hapus Data Barang
        if (isset($_GET['id_barang'])) {
            $id_barang = htmlspecialchars($_GET['id_barang']); 
            $sql = "DELETE FROM tb_barang WHERE id_barang = '$id_barang'";
            $hasil = mysqli_query($kon, $sql);
            if ($hasil) {
                echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
            } else {
                echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
            }
        }
        ?>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
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
                    echo "<td>" . htmlspecialchars($data['nama_barang']) . "</td>";
                    echo "<td>Rp " . number_format($data['harga_barang'], 0, ',', '.') . "</td>";
                    echo "<td>" . htmlspecialchars($data['stok_barang']) . "</td>";
                    echo "<td>
                        <a href='index.php?id_barang=" . $data['id_barang'] . "' class='btn btn-sm btn-danger'>Hapus</a>
                        <a href='update.php?id_barang=" . $data['id_barang'] . "' class='btn btn-sm btn-warning'>Edit</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <a href="createadmin.php" class="btn btn-primary mt-3">Tambah Menu</a>
        </div>
    </div>
</body>
</html>
