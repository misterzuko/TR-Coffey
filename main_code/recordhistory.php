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
    <link rel="stylesheet" href="styles.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link rel="stylesheet" href="../css/riwayat.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="kasir.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <div class="collapse navbar-collapse ms-5 ps-3 ham-nav" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="kasir.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="recordhistory.php">Riwayat</a>
                    </li>
                </ul>
            </div>
            <a href="logout.php" onClick = <?php session_destroy(); ?>>
                <button class="btn btn-danger">Keluar</button>
            </a>
        </div>   
    </nav>
    <div class="containt">
        <table class="table containt-record table-striped-columns">
            <thead>
                <tr>
                    <th colspan="11" class="text-center fs-3 bg-secondary">Riwayat Transaksi</th>
                </tr>
                <tr class="text-center">
                    <th>ID Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Jenis Kopi</th>
                    <th>Penyajian</th>
                    <th>Topping</th>
                    <th>Ukuran Cup</th>
                    <th>Total</th>
                    <th>Metode Pembayaran</th>
                    <th>Status Pesanan</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='text-center'>
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
                               <td>";
                                if ($row['status_pesanan'] === 'Diproses') {
                                  
                                        echo "<form action='pembayaran.php' method='POST'>
                                            <input type='hidden' name='id_pesanan' value='{$row['id_pesanan']}'>
                                            <input type='hidden' name='metode_pembayaran' value='{$row['metode_pembayaran']}'>
                                            <input type='hidden' name='total_belanja' value='{$row['total']}'>
                                            <button type='submit' name='selesaikan' class='btn btn-warning fs-small w-100'>Proses</button>
                                        </form>";
                                    
                                    
                                } elseif ($row['status_pesanan'] === 'Selesai') {
                                    echo "<form action='' method='POST'>
                                            <input type='hidden' name='id_pesanan' value='{$row['id_pesanan']}'>
                                            <a href='cetak_struk.php?id_pesanan={$row['id_pesanan']}' class='btn btn-warning fs-small w-100'>Cetak</a>
                                        </form>";
                                }
                            echo "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>Tidak ada data transaksi.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script> 
        document.addEventListener("DOMContentLoaded", function () {
            const navbar = document.querySelector('.navbar');
            navbar.classList.add('navbar-solid');
        });
    </script>
</body>
</html>
