<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_cafe";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa jika ada checkbox yang dipilih
if (isset($_POST['data']) && !empty($_POST['data'])) {
    // Menyimpan data yang dipilih dalam array
    $dataToDelete = $_POST['data'];

    // Menyiapkan query untuk menghapus data berdasarkan ID yang dipilih
    $ids = implode(',', array_map('intval', $dataToDelete)); // Menyusun ID yang dipilih menjadi string
    $sql = "DELETE FROM tb_barang WHERE id_barang IN ($ids)";

    // Mengeksekusi query
    if ($conn->query($sql) === TRUE) {
        header("Location: admins.php?hapus-produk");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Tidak ada data yang dipilih untuk dihapus.";
}

// Menutup koneksi database
$conn->close();
?>