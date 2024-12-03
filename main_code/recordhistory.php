<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaPemesan = $_POST['nama_pemesan'];
    $jenisKopi = $_POST['jenis_kopi'];
    $jenisPenyajian = $_POST['jenis_penyajian'];
    $jenisTopping = $_POST['jenis_topping'];
    $ukuranCup = $_POST['ukuran_cup'];
    $metodePembayaran = $_POST['metode_pembayaran'];
    $totalHarga = $_POST['total_harga'];
    $tanggalPemesanan = date('Y-m-d');

    $sql = "INSERT INTO tb_recordhistory (nama_pemesan, jenis_kopi, jenis_penyajian, jenis_topping, ukuran_cup, total, metode_pembayaran, status_pesanan, tanggal_pemesanan)
            VALUES ('$namaPemesan', '$jenisKopi', '$jenisPenyajian', '$jenisTopping', '$ukuranCup', $totalHarga, '$metodePembayaran', 'Selesai', '$tanggalPemesanan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pesanan berhasil disimpan!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM tb_recordhistory ORDER BY tanggal_pemesanan DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Transaksi</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="kasir.css">
</head>
<body>
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
        <a href="kasir.php" class="back">Kembali ke Kasir</a>
    </div>
</body>
</html>
