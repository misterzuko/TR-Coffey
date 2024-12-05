<?php include 'connect.php';
session_start();
$nama_barang = $harga_barang = $stok_barang = $link_gambar = $id_barang = '';

if (isset($_GET['edit'])) {
    $id_barang = $_GET['edit'];

    $query = $conn->prepare("SELECT * FROM tb_barang WHERE id_barang = ?");
    $query->bind_param("i", $id_barang);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $barang = $result->fetch_assoc();
        $nama_barang = $barang['nama_barang'];
        $harga_barang = $barang['harga_barang'];
        $stok_barang = $barang['stok_barang'];
        $link_gambar = $barang['link_gambar'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="admins.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <div class="collapse navbar-collapse ms-5 ps-3 ham-nav" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="admins.php">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="riwayatadmin.php">Riwayat</a>
                    </li>
                </ul>
            </div>
            <a href="logout.php" id="keluar">
                <button class="btn btn-danger">Keluar</button>
            </a>
        </div>
    </nav>
    <div class="container mt-4">
        <?php if (isset($_GET['edit'])) { ?>
            <form method="POST" action="process.php?edit" enctype="multipart/form-data">
        <?php } ?>
        <?php if (isset($_GET['tambah'])) { ?>
            <form method="POST" action="process.php?tambah" enctype="multipart/form-data">
        <?php } ?>
                <div class="mb-3 row sub-form">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_barang" id="nama" placeholder="Contoh: Rexcy"
                            value="<?php if (isset($_GET['edit'])) {
                                echo $nama_barang;
                            } ?>" required>
                    </div>
                </div>
                <div class="mb-3 row sub-form">
                    <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="harga_barang" id="harga"
                            placeholder="Contoh: 12000" value="<?php if (isset($_GET['edit'])) {
                                echo $harga_barang;
                            } ?>"
                            required>
                    </div>
                </div>
                <div class="mb-3 row sub-form">
                    <label for="stok" class="col-sm-2 col-form-label">Stok Barang</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="stok_barang" id="stok" placeholder="Contoh: 18"
                            value="<?php if (isset($_GET['edit'])) {
                                echo $stok_barang;
                            } ?>" min="0" required>
                    </div>
                </div>
                <div class="mb-3 row sub-form">
                    <label for="jenis" class="col-sm-2 col-form-label">Jenis Barang</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jenis_barang" id="jenis" required>
                            <option value="Kopi">Kopi</option>
                            <option value="Cup">Cup</option>
                            <option value="Topping">Topping
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row sub-form" id="gambar-container">
                    <label for="gambar" class="col-sm-2 col-form-label">Upload Gambar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="link_gambar" id="gambar">
                        <?php if (!empty($link_gambar)): ?>
                            <p>Gambar saat ini: <a href="<?php if (isset($_GET['edit'])) {
                                echo $link_gambar;
                            } ?>"
                                    target="_blank">Lihat</a></p>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" name="id_barang" value="<?php if (isset($_GET['edit'])) {
                    echo $id_barang;
                } ?>">
                <!-- Konfirmasi -->
                <div class="container d-flex justify-content-center align-items-center">
                    <div class="konfirmasi">
                        <div class="container">
                            <?php if (isset($_GET['edit'])) {
                                ?>
                                <h5>Apakah anda yakin ingin mengedit data tersebut?</h5>
                            <?php } ?>
                            <?php if (isset($_GET['tambah'])) {
                                ?>
                                <h5>Apakah anda yakin ingin menambahkan data tersebut?</h5>
                            <?php } ?>
                            <div class="submit mt-4 d-flex justify-content-around">
                                <input id="ya" type="submit" value="Ya, Saya yakin">
                                <a class="btn tidak">Tidak</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row aksi">
                    <div class="col mt-4 text-center">
                        <a class="btn btn-primary terapkan">
                            <?php if (isset($_GET['edit'])) {
                                ?>
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Terapkan Perubahan
                            <?php } ?>
                            <?php if (isset($_GET['tambah'])) {
                                ?>
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Tambahkan
                            <?php } ?>
                        </a>
                        <a href="admins.php" type="button" class="btn btn-danger">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            Batal
                        </a>
                    </div>
                </div>
            </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const jenisSelect = document.getElementById('jenis');
            const gambarContainer = document.getElementById('gambar-container');

            const updateGambarInput = () => {
                if (jenisSelect.value === 'Kopi') {
                    gambarContainer.style.display = 'flex';
                } else {
                    gambarContainer.style.display = 'none';
                }
            };
            updateGambarInput();
            jenisSelect.addEventListener('change', updateGambarInput);
        });
        //Fungsi Konfirmasi cuy//
        const toggleKonfirmasi = document.querySelector('.terapkan');
        const toggleTidak = document.querySelector('.tidak');
        const konfirmasiClass = document.querySelector('.konfirmasi');
        const toggleButtons = document.querySelectorAll('.aksi .btn');
        const toggleLogOut = document.getElementById('keluar');
        const subForm = document.querySelectorAll('.sub-form');

        toggleKonfirmasi.addEventListener("click", function () {
            konfirmasiClass.classList.toggle('active');
            toggleButtons.forEach(button => {
                button.classList.add('disabled');
            });
            toggleLogOut.classList.add('disabled');
            subForm.forEach(sub => {
                sub.classList.add('disabled');
            });
        });

        toggleTidak.addEventListener("click", function () {
            konfirmasiClass.classList.remove('active');
            toggleButtons.forEach(button => {
                button.classList.remove('disabled');
            });
            toggleLogOut.classList.remove('disabled');
            subForm.forEach(sub => {
                sub.classList.remove('disabled');
            });
        });



    </script>
</body>

</html>