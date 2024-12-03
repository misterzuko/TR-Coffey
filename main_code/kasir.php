<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Kasir</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #000;
            color: #fff;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background: #333;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #ffcc00;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 30px;
        }

        form label {
            font-weight: 700;
            color: #fff;
        }

        form input,
        form select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #444;
            color: #fff;
        }

        form button {
            grid-column: 1 / -1;
            padding: 10px 20px;
            background-color: #ffcc00;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            font-weight: 700;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #e6b800;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 1.5rem;
            color: #ffffff;
            font-weight: 700;
        }

        .back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffcc00;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .back:hover {
            background-color: #e6b800;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kasir kopiin aja</h1>

        <form action="recordhistory.php" method="POST">
            <label for="nama-pemesan">Nama Pemesan:</label>
            <input type="text" id="nama-pemesan" name="nama_pemesan" placeholder="Masukkan nama pemesan" required>

            <label for="jenis-kopi">Jenis Kopi:</label>
            <select id="jenis-kopi" name="jenis_kopi" required>
                <option value="">-- Pilih Jenis Kopi --</option>
                <option value="Espresso">Espresso</option>
                <option value="Latte">Latte</option>
                <option value="Cappuccino">Cappuccino</option>
            </select>

            <label for="jenis-penyajian">Jenis Penyajian:</label>
            <select id="jenis-penyajian" name="jenis_penyajian" required>
                <option value="">-- Pilih Penyajian --</option>
                <option value="Panas">Panas</option>
                <option value="Dingin">Dingin</option>
            </select>

            <label for="jenis-topping">Topping:</label>
            <select id="jenis-topping" name="jenis_topping" required>
                <option value="">-- Pilih Topping --</option>
                <option value="Whipped Cream">Whipped Cream</option>
                <option value="Coklat Serut">Coklat Serut</option>
                <option value="Caramel">Caramel</option>
            </select>

            <label for="ukuran-cup">Ukuran Cup:</label>
            <select id="ukuran-cup" name="ukuran_cup" required>
                <option value="">-- Pilih Ukuran Cup --</option>
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>

            <label for="metode-pembayaran">Metode Pembayaran:</label>
            <select id="metode-pembayaran" name="metode_pembayaran" required>
                <option value="">-- Pilih Metode Pembayaran --</option>
                <option value="Cash">Cash</option>
                <option value="Debit">Debit</option>
                <option value="E-Wallet">E-Wallet</option>
            </select>

            <input type="hidden" id="total-harga-form" name="total_harga">
            <button type="submit" id="btn-pesan">Pesan</button>
        </form>

        <div class="total">
            Total :<span id="total-harga">Rp0,00</span>
        </div>
        <a href="recordhistory.php" class="back">Lihat Rekam Transaksi</a>
    </div>

    <script>
        const hargaBarang = {
            "Espresso": 25000,
            "Latte": 30000,
            "Cappuccino": 35000,
            "Panas": 10000,
            "Dingin": 15000,
            "Whipped Cream": 5000,
            "Coklat Serut": 6000,
            "Caramel": 7000,
            "Small": 5000,
            "Medium": 7000,
            "Large": 9000
        };
        function hitungTotalHarga() {
            let total = 0;

            const jenisKopi = document.getElementById('jenis-kopi').value;
            const jenisPenyajian = document.getElementById('jenis-penyajian').value;
            const jenisTopping = document.getElementById('jenis-topping').value;
            const ukuranCup = document.getElementById('ukuran-cup').value;

            if (jenisKopi && hargaBarang[jenisKopi]) total += hargaBarang[jenisKopi];
            if (jenisPenyajian && hargaBarang[jenisPenyajian]) total += hargaBarang[jenisPenyajian];
            if (jenisTopping && hargaBarang[jenisTopping]) total += hargaBarang[jenisTopping];
            if (ukuranCup && hargaBarang[ukuranCup]) total += hargaBarang[ukuranCup];
            document.getElementById('total-harga').innerText = 'Rp' + total.toLocaleString();
            document.getElementById('total-harga-form').value = total;
        }   
        document.getElementById('jenis-kopi').addEventListener('change', hitungTotalHarga);
        document.getElementById('jenis-penyajian').addEventListener('change', hitungTotalHarga);
        document.getElementById('jenis-topping').addEventListener('change', hitungTotalHarga);
        document.getElementById('ukuran-cup').addEventListener('change', hitungTotalHarga);
        hitungTotalHarga();
    </script>
</body>
</html>
