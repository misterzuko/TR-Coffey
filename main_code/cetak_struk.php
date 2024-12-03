<?php
include 'connect.php';

if (isset($_GET['id_pesanan'])) {
    $idPesanan = $_GET['id_pesanan'];
    $sql = "SELECT * FROM tb_recordhistory WHERE id_pesanan = $idPesanan";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else {
    echo "Pesanan tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 280px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
        }
        h1 {
            font-size: 18px;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: left;
        }
        table th, table td {
            padding: 5px;
        }
        table th {
            width: 40%;
            text-align: left;
        }
        .total {
            font-weight: bold;
            font-size: 16px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:active {
            background-color: #45a049;
        }
        .back-btn {
            background-color: #f44336;
        }
        .back-btn:active {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Struk Pembelian</h1>
        <table>
            <tr><th>ID Pesanan</th><td><?php echo $row['id_pesanan']; ?></td></tr>
            <tr><th>Nama Pemesan</th><td><?php echo $row['nama_pemesan']; ?></td></tr>
            <tr><th>Jenis Kopi</th><td><?php echo $row['jenis_kopi']; ?></td></tr>
            <tr><th>Jenis Penyajian</th><td><?php echo $row['jenis_penyajian']; ?></td></tr>
            <tr><th>Topping</th><td><?php echo $row['jenis_topping']; ?></td></tr>
            <tr><th>Ukuran Cup</th><td><?php echo $row['ukuran_cup']; ?></td></tr>
            <tr><th>Total</th><td class="total">Rp<?php echo number_format($row['total'], 0, ',', '.'); ?></td></tr>
            <tr><th>Metode Pembayaran</th><td><?php echo $row['metode_pembayaran']; ?></td></tr>
        </table>
        <button class="btn" onclick="window.print()">Cetak Struk</button>
        <a href="kasir.php"><button class="btn back-btn">Kembali ke Kasir</button></a>
    </div>
</body>
</html>
