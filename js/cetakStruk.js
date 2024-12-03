function printReceipt() {
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
    <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=300, initial-scale=1.0">
          <title>Struk</title>
          <link rel="stylesheet" href="styles.css?v=1.1">
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
          <link href="../css/bootstrap.min.css" rel="stylesheet">
          <link href="../css/struk.css" rel="stylesheet">
          <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
      </head>
      <body>
        <div class="d-flex justify-content-center align-items-center">
          <table class="table struk">
            <tr>
              <th colspan="11" class="text-center fs-5 pb-2">Struk Pembelian</th>
            </tr>
            <tr>
              <th>Nama Toko</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>No. Kuitansi</th>
              <th>Jenis Kopi</th>
              <th>Ukuran</th>
              <th>Jenis Penyajian</th>
              <th>Jenis Topping</th>
              <th>Total</th>
              <th>Metode Pembayaran</th>
              <th>Kembalian</th>
            </tr>
            <tr>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
              <td>x</td>
            </tr>
          </table>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-1">
          <input type="button" value="Simpan" class="btn btn-success fw-bold">
        </div>
      </body>
    </html>
    `);
    printWindow.document.close();
    printWindow.print();
}