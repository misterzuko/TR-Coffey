<?php include 'connect.php' ?>
<?php
//Tambah Data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['tambah'])) {
    $nama_barang = $_POST['title'];
    $stok_barang = $_POST['stok'];
    $harga_barang = $_POST['harga'];


    $gambar_path = NULL;
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = $_FILES['gambar'];
        $target_dir = "../src/barang";
        $gambar_path = $target_dir . basename($gambar["name"]);

        if (move_uploaded_file($gambar["tmp_name"], $gambar_path)) {
        } else {
            echo "Terjadi kesalahan saat upload gambar.";
        }
    }

    $sql = "INSERT INTO tb_barang (nama_barang, harga_barang, stok_barang, path_gambar) 
            VALUES ('$nama_barang', '$harga_barang','$stok_barang', '$gambar_path')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//Update Data 
if (isset($_GET['edit'])) {
    $id_barang = $_GET['edit'];

    $sql = "SELECT * FROM tb_barang WHERE id_barang = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_barang);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_barang = $row['id_barang'];
        $nama_barang = $row['nama_barang'];
        $harga_barang = $row['harga_barang'];
        $stok_barang = $row['stok_barang'];
    }
    //Update Data 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_barang = $_POST['title'];
        $harga_barang = $_POST['harga'];
        $stok_barang = $_POST['stok'];
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $gambar = $_FILES['gambar'];
            $target_dir = "../src/barang";
            $gambar_path = $target_dir . basename($gambar["name"]);
            if (move_uploaded_file($gambar["tmp_name"], $gambar_path)) {
            } else {
                echo "Terjadi kesalahan saat upload gambar.";
            }
        }
        // Update data barang
        $update_sql = "UPDATE tb_barang SET nama_barang = '$nama_barang', harga_barang = '$harga_barang', stok_barang = '$stok_barang' WHERE id_barang = '$id_barang'";
        if ($conn->query($update_sql) === TRUE) {
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
//Read Data
$sql = "SELECT * FROM tb_barang";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeinAja</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar sticky-top">
        <div class="container">
            <h3 class="mt-2">Dashboard Admin</h3>
            <a class="btn btn-logout" href="login.php">Logout</a>
        </div>
    </nav>
    <!--Tambah Data-->
    <?php if (isset($_GET['tambah'])) { ?>
        <div class="tambah">
            <div class="container-lg d-flex flex-column align-items-center my-3 main">
                <h3>Tambah Menu</h3>
                <div class="upload-container container">
                    <form action="admins.php?tambah=1" method="post" enctype="multipart/form-data"
                        class="container d-flex flex-column mt-3">
                        <div class="d-flex flex-column input">
                            <label class="mb-2" for="title">Nama Produk :</label>
                            <input type="text" name="title" id="title" placeholder="Masukan Nama Produk">
                        </div>
                        <div class="d-flex flex-column mt-3 input">
                            <label class="mb-2" for="title">Insert Gambar :</label>
                            <input type="file" accept=".jpg,.jpeg,.png,.svg" name="file" id="file">
                        </div>
                        <div class="d-flex flex-column input mt-3">
                            <label class="mb-2" for="stok">Stok :</label>
                            <input type="number" name="stok" id="stok" placeholder="Masukan Jumlah Stok">
                        </div>
                        <div class="d-flex flex-column mt-3 input">
                            <label class="mb-2" for="harga">Harga :</label>
                            <input type="number" name="harga" id="harga" placeholder="Masukan Harga">
                        </div>
                        <div class="submit mt-3">
                            <input type="submit" value="Upload">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php } ?>
    <!--Edit Data-->
    <?php if (isset($_GET['edit'])) { ?>
        <div class="edit">
            <div class="container-lg d-flex flex-column align-items-center my-3 main">
                <h3>Edit Menu</h3>
                <div class="upload-container container">
                    <form action="admins.php?edit=<?php echo $id_barang; ?>" method="post" enctype="multipart/form-data"
                        class="container d-flex flex-column mt-3">
                        <div class="d-flex flex-column input">
                            <label class="mb-2" for="title">Nama Produk :</label>
                            <input type="text" name="title" id="title" placeholder="Masukan Nama Produk"
                                value="<?php echo $nama_barang; ?>">
                        </div>
                        <div class="d-flex flex-column mt-3 input">
                            <label class="mb-2" for="title">Insert Gambar :</label>
                            <input type="file" accept=".jpg,.jpeg,.png,.pdf" name="file" id="file">
                        </div>
                        <div class="d-flex flex-column input mt-3">
                            <label class="mb-2" for="stok">Stok :</label>
                            <input type="number" name="stok" id="stok" placeholder="Masukan Jumlah Stok"
                                value="<?php echo $stok_barang; ?>">
                        </div>
                        <div class="d-flex flex-column mt-3 input">
                            <label class="mb-2" for="harga">Harga :</label>
                            <input type="number" name="harga" id="harga" placeholder="Masukan Harga"
                                value="<?php echo $harga_barang; ?>">
                        </div>
                        <div class="submit mt-3">
                            <input type="submit" value="Terapkan Perubahan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if(isset($_GET['data'])){ 
        
        ?>
    <div class="d-flex my-4 data">
        <div class="container">
            <h3>Data</h3>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th class="">ID</th>
                        <th class="">Nama Produk</th>
                        <th class="">Gambar</th>
                        <th class="">Stok</th>
                        <th class="">Harga</th>
                        <th class="">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data_exist = false;
                    while ($row = $result->fetch_assoc()) {
                        $data_exist = true;
                        $id_barang = $row['id_barang'];
                        ?>
                        <tr>
                            <td><?= $row['id_barang'] ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['path_gambar'] ?></td>
                            <td><?= $row['stok_barang'] ?></td>
                            <td><?= $row['harga_barang'] ?></td>
                            <td><a href="admins.php?edit=<?php echo $id_barang; ?>"><img src="../src/edit.png"></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php if (!$data_exist) {
                ?>
                <h3 class="text-center mt-4">Tidak Ada Data!</h3>
                <?php
            }
            ?>
        </div>
        <?php }?>
    </div>

</body>

</html>