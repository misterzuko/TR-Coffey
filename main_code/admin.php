<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<header class="bg-blue-600 py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-3xl font-bold text-white">Dashboard Admin</h1>
        <a href="" 
           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300">
            Logout
        </a>
    </div>
    </header>
<body class="bg-gray-50">
        <!-- Form Upload -->
        <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold text-center mb-6">Upload Menu </h2>
        <form action="admin.php" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk:</label>
                <input type="text" id="title" name="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Produk">
            </div>
            <div class="mb-4">
                <label for="link" class="block text-gray-700 text-sm font-bold mb-2">Link Gambar:</label>
                <input type="file" id="link" name="link" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Gambar Produk">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga:</label>
                <input type="number" id="price" name="price" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Harga Produk">
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" value="Upload" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>

        <!-- Tabel Data -->
        <div class="bg-white shadow-lg rounded-lg px-10 py-8">
    <h2 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-4">Data</h2>
    <table class="w-full border-collapse bg-gray-50 overflow-hidden rounded-lg shadow-sm">
        <thead class="bg-gradient-to-r from-blue-500 to-blue-700 text-white">
            <tr>
                <th class="">ID</th>
                <th class="">Nama Produk</th>
                <th class="">Gambar</th>
                <th class="">Harga</th>
                <th class="">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr class="border-t hover:bg-gray-100 transition duration-200">
                <td class="border px-4 py-3 text-gray-700"><?= $row['id'] ?></td>
                <td class="border px-4 py-3 text-gray-700"><?= $row['title'] ?></td>
                <td class="border px-4 py-3">
                    <img src="http://localhost/TR/Produk/<?= isset($_GET['kategori']) ? ucfirst($_GET['kategori']) : 'Brownies' ?>/<?= $row['link'] ?>" 
                        alt="<?= $row['title'] ?>" 
                        class="h-16 w-16 object-cover rounded-md shadow-sm">
                </td>
                <td class="border px-4 py-3 text-gray-700">Rp <?= number_format($row['price'], 0, ',', '.') ?></td>
                <td class="border px-4 py-3 text-center flex justify-center gap-2">
                    <a href="?kategori=<?= $kategori ?>&delete_id=<?= $row['id'] ?>" 
                       class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow-sm transition duration-300"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                    <!-- <a href="?kategori=<?= $kategori ?>&edit_id=<?= $row['id'] ?>" 
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-sm transition duration-300">Edit</a> -->
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

    <style>
        .btn-blue, .btn-red, .btn-category {}
        .form-input {}
    </style>
</body>
</html>