<?php
    include 'connect.php';
    session_start();
    $username = $_SESSION['credential']['username'];
    for($i=1;isset($_SESSION['data-kopi'][$i]['id_barang']);$i++){
        if (isset($_POST[$i])){
            $kopi=$i;
        }
    }
    $query = "SELECT * FROM tb_barang WHERE id_barang='$kopi'";
    $sql = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($sql);
    if($_SESSION['data-kopi'][1]['id_barang']==NULL){
        header('location: login.php');
    }
?>

<!--
    proteksi overflow stok: value max cuma bisa mengikuti banyaknya stok,
    pengambilan data dari menu.php back ke js lalu eksekusi perhitungan total
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script>
        function redirectOnReload() {
    if (performance.navigation.type === 1) {
        window.location.href = "user.php";
    }
    }
    window.addEventListener('load', redirectOnReload);

    var selectedstock = <?php echo $_SESSION['data-es'][0]['harga_barang'];?>;
    var selectedValue;
    var stokEs = <?php echo $_SESSION['data-es'][0]['stok_barang'];?>;
    var hargaEs = <?php echo $_SESSION['data-es'][0]['harga_barang'];?>;
    var hargaCup = <?php echo $_SESSION['data-cup'][1]['harga_barang']?>;
    var pakeEs = 0;
    function pakedingin(bool){
        pakeEs=bool;
        hargaUpdater();
    }
    window.addEventListener("click", hargaUpdater);
    var total = 0;
    function hargaUpdater(){
        total = (jumlahKopi*document.getElementById("harga-kopi").innerText)+(selectedstock*document.getElementById("jmlhtopping").value)+(pakeEs*hargaEs)+(hargaCup*1);
        document.getElementById("harga").innerHTML = "Total Harga: Rp."+total;
    }
    function updatevalcup(idx) {
    var cekcup = <?php 
        $stokArray = array();
        for($i=1;isset($_SESSION['data-cup'][$i]['id_barang']);$i++){
            $stokArray[] = $_SESSION['data-cup'][$i]['harga_barang'];
        }
        echo json_encode($stokArray);
    ?>;
    hargaUpdater();
}
   function updatemax() {
    selectedValue = document.getElementById("topping").value;
    
    var stok = <?php 
        $stokArray = array();
        for($i=1;isset($_SESSION['data-topping'][$i]['id_barang']);$i++){
            $stokArray[] = $_SESSION['data-topping'][$i]['stok_barang'];
        }
        echo json_encode($stokArray);
    ?>;
    var hrgstok = <?php 
        $stokArray = array();
        for($i=1;isset($_SESSION['data-topping'][$i]['id_barang']);$i++){
            $stokArray[] = $_SESSION['data-topping'][$i]['harga_barang'];
        }
        echo json_encode($stokArray);
    ?>;
    document.getElementById("jmlhtopping").value = 0;
    document.getElementById("jmlhtopping").max = stok[selectedValue-1];
    selectedstock=hrgstok[selectedValue-1];
    hargaUpdater();
}
    
    </script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="user.php">
                <i class="fa fa-coffee fa-2x col-3" aria-hidden="true"></i>
                <p class="col-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-5 px-3" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a aria-current="page" href="user.php">Home</a>
                    </li>
                </ul>
                <div class="ms-5">
                    <a href="" class="text-decoration-none text-light d-flex flex-column align-items-center justify-content-center">
                        <button class="profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </button>
                        <?php echo $username; ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5 d-flex justify-content-center align-items-center">
        <table class="table w-75 text-center tb">
            <thead>
                <tr class="text-center">
                    <th scope="col">Menu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <form class="row needs-validation" novalidate>
                            <div class="col-md-5 mt-5 d-flex flex-column align-items-center justify-content-center card-menu">
                                <img src="../src/<?php echo $kopi;?>.png" alt="Kopi-4" class="img-fluid img-menu">
                                <h6 class="mt-3 text-center"><?php echo $result['nama_barang'];?></h6>
                                <p class="text-center">Rp.<text id="harga-kopi"><?php echo $result['harga_barang'];?></text></p>
                                <div class="d-flex align-items-center justify-content-center mt-2 tambah-barang">
                                    <button type="button" class="btn-icon" onclick="kurangkopi()">
                                        <i class="fa fa-minus-circle fs-4 me-3 cursor-pointer" aria-hidden="true"></i>
                                    </button>
                                    <p class="mb-0" id="banyak-kopi">1</p>
                                    <button type="button" class="btn-icon" onclick="tambahkopi()">
                                        <i class="fa fa-plus-circle text-primary fs-4 ms-3 cursor-pointer" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-7 row g-3">
                                <div class="col-md-12 row g-3">
                                    <div class="col-md-4 d-flex align-items-center justify-content-end">
                                        <div class="form-check fw-bold ps-2">
                                            <p>Jenis Penyajian:</p>
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex align-items-center justify-content-evenly">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dinginpanas" id="dinginpanas" onclick="pakedingin(0)" checked>
                                            <label class="form-check-label" for="panas">
                                                <p class="fw-bold">Hot</p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="dinginpanas" id="dinginpanas" onclick="pakedingin(1)">
                                            <label class="form-check-label" for="dingin">
                                                <p class="fw-bold">Ice</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 row g-3">
                                    <div class="col-md-3 d-flex align-items-center justify-content-start ps-5 fw-bold">
                                        <p>Size Cup: </p>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ukuran" id="ukuran" onchange="updatevalcup(1)" checked>
                                            <label class="form-check-label" for="small">
                                                <p class="fw-bold">Small</p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ukuran" id="ukuran" onchange="updatevalcup(2)">
                                            <label class="form-check-label" for="Regular">
                                                <p class="fw-bold">Regular</p>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ukuran" id="ukuran" onchange="updatevalcup(3)" >
                                            <label class="form-check-label" for="Large">
                                                <p class="fw-bold">Large</p>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 row g-3 d-flex align-items-center justify-content-center">
                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                        <div class="container text-center">
                                            <label for="topping" class="form-label fw-bold">Pilih Topping</label>
                                            <select class="form-select w-75 mx-auto" id="topping" onchange="updatemax()" required>
                                                <option value="1" selected><?php echo $_SESSION['data-topping'][1]['nama_barang'];?></option>
                                                <?php
                                                for($i=2;isset($_SESSION['data-topping'][$i]['id_barang']);$i++){
                                                ?>
                                                <option value="<?php echo $i;?>"><?php echo $_SESSION['data-topping'][$i]['nama_barang'];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                        <div class="container text-center">
                                            <label for="jmlhtopping" class="form-label fw-bold">Jumlah Topping</label>
                                            <input type="number" class="form-control w-50 mx-auto" id="jmlhtopping" min="0" max="<?php echo $_SESSION['data-topping'][1]['stok_barang'];?>" value="0" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row g-3">
                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <p class="garis container-expand-lg"></p>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-start ps-5">
                                    <p id="harga" class="fw-bold">Total Harga: Rp 0</p>
                                </div>
                                <div class="col-6 mb-3">
                                    <input type="submit" class="btn btn-success fw-bold fs-5 w-25" value="Beli">
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>