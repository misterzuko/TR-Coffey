<!DOCTYPE html>
<html>
<head>
    <title>Menu Pemesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="pemesanan.css">
</head>
<body>
<div class="container">
    <h2 class="mt-4">Pemesanan Menu</h2>
    <?php
    include "koneksi.php"; 
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_pembeli = input($_POST["nama_pembeli"]);
        $id_barang = input($_POST["id_barang"]);
        $jumlah_pesanan = input($_POST["jumlah_pesanan"]);
        $query_barang = "SELECT * FROM tb_barang WHERE id_barang = $id_barang";
        $result_barang = mysqli_query($kon, $query_barang);
        $barang = mysqli_fetch_assoc($result_barang);
        
        if ($barang && $barang['stok_barang'] >= $jumlah_pesanan) {
            $nama_pesanan = $barang['nama_barang'];
            $harga_total = $barang['harga_barang'] * $jumlah_pesanan;
            $stok_baru = $barang['stok_barang'] - $jumlah_pesanan;
            $update_stok = "UPDATE tb_barang SET stok_barang = $stok_baru WHERE id_barang = $id_barang";
            mysqli_query($kon, $update_stok);

            $query_transaksi = "INSERT INTO tb_transaksi (nama_pembeli, nama_pesanan, total_harga, tanggal_pembelian) 
                              VALUES ('$nama_pembeli', '$nama_pesanan', '$harga_total', NOW())";
            mysqli_query($kon, $query_transaksi);
            
            header("Location: daftar_transaksi.php");
            exit(); 
        } else {
            echo "<div class='alert alert-danger'>Stok tidak mencukupi atau barang tidak ditemukan.</div>";
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label>Nama Pembeli</label>
            <input type="text" name="nama_pembeli" class="form-control" placeholder="Masukkan nama pembeli" required>
        </div>
        <div class="form-group">
            <label>Pilih Menu</label>
            <select name="id_barang" class="form-control" required>
                <option value="">-- Pilih Menu --</option>
                <?php
                $query = "SELECT * FROM tb_barang";
                $result = mysqli_query($kon, $query);
                while ($barang = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$barang['id_barang']}'>{$barang['nama_barang']} - Rp {$barang['harga_barang']} (Stok: {$barang['stok_barang']})</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah Pesanan</label>
            <input type="number" name="jumlah_pesanan" class="form-control" placeholder="Masukkan jumlah pesanan" required>
        </div>
        <button type="submit" class="btn btn-primary">Pesan</button>
        <a href="index.php"button type="submit" class="btn btn-danger">Back</a>
    </form>
</div>
</body>
</html>
