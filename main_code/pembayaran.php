<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['proses_pembayaran'])) {
        $idPesanan = $_POST['id_pesanan'];
        $metodePembayaran = $_POST['metode_pembayaran'];
        $totalBelanja = $_POST['total_belanja'];
        $jumlahBayar = isset($_POST['jumlah_bayar']) ? $_POST['jumlah_bayar'] : $totalBelanja;
        $kembalian = 0;

        if ($metodePembayaran == 'tunai') {
            $kembalian = $jumlahBayar - $totalBelanja;
            if ($kembalian < 0) {
                $error = "Jumlah bayar kurang! Harap masukkan jumlah yang cukup.";
            }
        }

        if (!isset($error)) {
            $updateSql = "UPDATE tb_recordhistory SET status_pesanan = 'Selesai' WHERE id_pesanan = $idPesanan";
            if ($conn->query($updateSql) === TRUE) {
                $success = "Pembayaran berhasil! Kembalian Anda: Rp" . number_format($kembalian, 0, ',', '.');
            } else {
                $error = "Terjadi kesalahan saat memperbarui status pesanan.";
            }
        }
    }
}

if (isset($_GET['id_pesanan']) && isset($_GET['metode_pembayaran'])) {
    $idPesanan = $_GET['id_pesanan'];
    $metodePembayaran = $_GET['metode_pembayaran'];
    $sql = "SELECT total FROM tb_recordhistory WHERE id_pesanan = $idPesanan";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalBelanja = $row['total'];
} else {
    die("Pesanan tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran</title>
    <link rel="stylesheet" href="pembayaran.css">
</head>
<body>
    <div class="container">
        <h1>Metode Pembayaran</h1>
        
        <!-- Menampilkan metode pembayaran -->
        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <input type="text" id="metode_pembayaran" value="<?= htmlspecialchars($metodePembayaran) ?>" readonly>
        </div>

        <!-- Form untuk proses pembayaran -->
        <form action="" method="POST">
            <input type="hidden" name="id_pesanan" value="<?= $idPesanan ?>">
            <input type="hidden" name="metode_pembayaran" value="<?= htmlspecialchars($metodePembayaran) ?>">
            
            <div class="form-group">
                <label for="total_belanja">Total Belanja (Rp):</label>
                <input type="number" id="total_belanja" name="total_belanja" required value="<?= $totalBelanja ?>" readonly>
            </div>

            <?php if ($metodePembayaran === 'tunai'): ?>
                <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Bayar (Rp):</label>
                    <input type="number" id="jumlah_bayar" name="jumlah_bayar" required placeholder="Masukkan jumlah bayar">
                </div>
            <?php else: ?>
                <input type="hidden" name="jumlah_bayar" value="<?= $totalBelanja ?>">
            <?php endif; ?>

            <button type="submit" name="proses_pembayaran">Proses Pembayaran</button>
        </form>

        <!-- Pesan Error atau Sukses -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php elseif (isset($success)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
