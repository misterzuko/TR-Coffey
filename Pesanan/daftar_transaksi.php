<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4">Daftar Transaksi</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Nama Pesanan</th>
            <th>Total Harga</th>
            <th>Tanggal Pembelian</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include "koneksi.php";

        $query = "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC";
        $result = mysqli_query($kon, $query);
        $no = 1;

        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $data['nama_pembeli'] . "</td>";
            echo "<td>" . $data['nama_pesanan'] . "</td>";
            echo "<td>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>";
            echo "<td>" . $data['tanggal_pembelian'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
