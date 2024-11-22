<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="daftar_transaksi.css">
</head>
<body>
    <div class="container">
        <h2>Riwayat Transaksi</h2>
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
                    $tanggal_pembelian = date("d-m-Y", strtotime($data['tanggal_pembelian']));
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $data['nama_pembeli'] . "</td>";
                    echo "<td>" . $data['nama_pesanan'] . "</td>";
                    echo "<td>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>";
                    echo "<td>" . $tanggal_pembelian . "</td>";  
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="back-btn">
            <a href="index.php" class="btn btn-danger">Back</a>
        </div>

    </div>
</body>
</html>
