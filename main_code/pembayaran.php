<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['proses_pembayaran'])) {
        $idPesanan = intval($_POST['id_pesanan']);
        $metodePembayaran = $conn->real_escape_string($_POST['metode_pembayaran']);
        $totalBelanja = floatval($_POST['total_belanja']);
        $jumlahBayar = isset($_POST['jumlah_bayar']) ? floatval($_POST['jumlah_bayar']) : $totalBelanja;
        $kembalian = 0;

        if ($metodePembayaran === 'tunai') {
            $kembalian = $jumlahBayar - $totalBelanja;
            if ($kembalian < 0) {
                $error = "Jumlah bayar kurang! Harap masukkan jumlah yang cukup.";
            }
        }

        if (!isset($error)) {
            $stmt = $conn->prepare("UPDATE tb_recordhistory SET status_pesanan = 'Selesai' WHERE id_pesanan = ?");
            $stmt->bind_param("i", $idPesanan);
            if ($stmt->execute()) {
                $success = "Pembayaran berhasil! " . ($metodePembayaran === 'tunai' ? "Kembalian Anda: Rp" . number_format($kembalian, 0, ',', '.') : "Transaksi berhasil tanpa kembalian.");
            } else {
                $error = "Terjadi kesalahan saat memperbarui status pesanan.";
            }
            $stmt->close();
        }
    }
}

if (isset($_POST['id_pesanan'], $_POST['metode_pembayaran'])) {
    $idPesanan = intval($_POST['id_pesanan']);
    $metodePembayaran = $conn->real_escape_string($_POST['metode_pembayaran']);
    $result = $conn->query("SELECT total FROM tb_recordhistory WHERE id_pesanan = $idPesanan");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/pembayaran.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
</head>
<body>
    <div class="container w-50">
        <h1>Metode Pembayaran</h1>
        <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <input type="text" id="metode_pembayaran" class="w-100" value="<?= htmlspecialchars($metodePembayaran) ?>" readonly>
        </div>
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

            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" name="proses_pembayaran" class="btn btn-success w-50">Proses Pembayaran</button>
            </div>
        </form>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php elseif (isset($success)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>
        <a href="recordhistory.php" class="d-flex justify-content-center align-items-center text-decoration-none"><button class="btn btn-danger w-50 mt-3">Kembali</button></a>
    </div>
</body>
</html>
