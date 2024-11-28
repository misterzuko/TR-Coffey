<?php
include 'connect.php'
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel ="stylesheet" href="kasir.css">
</head>
<body>
<?php
$sql = "SELECT * FROM tb_recordhistory ORDER BY tanggal_pemesanan DESC";
$result = $conn->query($sql);
?>
    <div class="container">
        <h1>Record Transaksi</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Jenis Kopi</th>
                    <th>Penyajian</th>
                    <th>Topping</th>
                    <th>Ukuran Cup</th>
                    <th>Total</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id_pesanan']}</td>
                                <td>{$row['nama_pemesan']}</td>
                                <td>{$row['jenis_kopi']}</td>
                                <td>{$row['jenis_penyajian']}</td>
                                <td>{$row['jenis_topping']}</td>
                                <td>{$row['ukuran_cup']}</td>
                                <td>Rp" . number_format($row['total'], 0, ',', '.') . "</td>
                                <td>{$row['metode_pembayaran']}</td>
                                <td>{$row['status_pesanan']}</td>
                                <td>{$row['tanggal_pemesanan']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>Tidak ada data transaksi.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="kasir.php" class="back" >Back</a>
    </div>
</body>
</html>
