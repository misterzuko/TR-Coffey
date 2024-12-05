<?php
    include 'connect.php'
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Kasir</title>
    <link rel="stylesheet" href="styles.css?v=1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link rel="stylesheet" href="../css/kasir.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent fixed-top">
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
            <a href="logout.php">
                <button class="btn btn-danger">Keluar</button>
            </a>
        </div>
    </nav>
    <div class="osda">
        <h1 class = "fw-bold fs-2">Menu Kasir</h1>
        <?php
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql = "SELECT id_barang, nama_barang, harga_barang, stok_barang FROM tb_barang";
        $result = $conn->query($sql);

        $kopi = [];
        $cup = [];
        $topping = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nama_barang = strtolower($row['nama_barang']);
                if (strpos($nama_barang, 'kopi') !== false) {
                    $kopi[] = $row;
                } elseif (strpos($nama_barang, 'cup') !== false) {
                    $cup[] = $row;
                } elseif (strpos($nama_barang, 'topping') !== false) {
                    $topping[] = $row;
                }
            }
        }

        function tampilkanTabel($data, $judul)
        {
            if (count($data) > 0) {
                echo "<table border = '1' class = 'table table-dark table-hover m-0'>
                        <thead>
                            <tr class = 'text-center fs-4'>
                                <th colspan = '3' class = ' bg-secondary text-dark'>$judul</th>
                            </tr>
                            <tr class = 'text-center'>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach ($data as $row) {
                    echo "<tr>
                            <td>{$row['nama_barang']}</td>
                            <td>Rp" . number_format($row['harga_barang'], 0, ',', '.') . "</td>
                            <td>{$row['stok_barang']}</td>
                           
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>Tidak ada data untuk kategori ini.</p>";
            }
        }
        tampilkanTabel($kopi, 'Kopi');
        tampilkanTabel($cup, 'Cup');
        tampilkanTabel($topping, 'Topping');
        $conn->close();
        ?>
    </div>

    <script>
        let totalHarga = 0;

        function updateTotal() {
            const totalHargaElement = document.getElementById('total-harga');
            totalHargaElement.textContent = "" + totalHarga.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).replace("IDR", ).trim();
        }
        document.querySelectorAll('.tambah').forEach(button => {
            button.addEventListener('click', function() {
                const harga = parseInt(this.getAttribute('data-price'));
                totalHarga += harga;
                updateTotal();
                alert('Pesanan sedang diproses');
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.querySelector('.navbar');
        navbar.classList.add('navbar-solid');
        });
    </script>
</body>
</html>