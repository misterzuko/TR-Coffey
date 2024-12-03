<?php
    include 'connect.php';
    session_start();
    $username = $_SESSION['credential']['username'];
    for($i=1;isset($_SESSION['data-kopi'][$i]['id_barang']);$i++){
        if (isset($_POST[$i])){
            $_SESSION['kopi-pilihan']=$i;
        }
    } if (!isset($_SESSION['kopi-pilihan'])){
        header('location: user.php');
    }
    $kopi = $_SESSION['kopi-pilihan'];
    $query = "SELECT * FROM tb_barang WHERE id_barang='$kopi'";
    $sql = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($sql);
    $_SESSION['saved-menu']=$result;
    if($_SESSION['data-kopi'][1]['id_barang']==NULL){
        header('location: login.php');
    }
?>

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
        window.addEventListener('click', hargaUpdater);
        var selectedValue;
        var hargaCup = <?php echo $_SESSION['data-cup'][1]['harga_barang']?>;
        var hargaTopping = <?php echo $_SESSION['data-topping'][1]['harga_barang']?>;

        function hargaUpdater() {
            let total = (document.getElementById("harga-kopi").innerText * 1) + (1 * hargaTopping) + (1 * hargaCup);
            document.getElementById("harga").innerHTML = total;
            document.getElementById("harga").value = total;
        }

        document.addEventListener('DOMContentLoaded', function() {
            hargaUpdater();
        });

        function updatevalcup(idx) {
            var cekcup = <?php 
                $stokArray = array();
                for($i=1;isset($_SESSION['data-cup'][$i]['id_barang']);$i++){
                    $stokArray[] = $_SESSION['data-cup'][$i]['harga_barang'];
                }
                echo json_encode($stokArray);
            ?>;
            hargaCup = cekcup[idx-1];
            hargaUpdater();
        }

        function updatemax() {
            selectedValue = document.getElementById("topping").value;
            var hrgstok = <?php 
                $stokArray2 = array();
                for($i=1;isset($_SESSION['data-topping'][$i]['id_barang']);$i++){
                    $stokArray2[] = $_SESSION['data-topping'][$i]['harga_barang'];
                }
                echo json_encode($stokArray2);
            ?>;
            hargaTopping = hrgstok[selectedValue-1];
            hargaUpdater();
        }
        <?php
            if(isset($_SESSION['stokhabis'])){
                ?>
                alert('<?php echo $_SESSION['stokhabis'];?>');
                <?php
                unset($_SESSION['stokhabis']);
            }
        ?>
    </script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-transparent sticky-top">
        <div class="container-fluid w-75 mt-3">
            <a class="navbar-brand fw-bold Brand row" href="user.php">
                <i class="fa fa-coffee fa-2x col-md-3" aria-hidden="true"></i>
                <p class="col-md-9 pt-2"><span>kopi</span>inaja</p>
            </a>
            <ul class="navbar-nav ms-5 me-auto">
                <li class="nav-item">
                    <a aria-current="page" href="user.php">Home</a>
                </li>
            </ul>
            <div class="ms-5 prof">
                <a href="profile.php" class="text-decoration-none text-light d-flex flex-column align-items-center justify-content-center">
                    <button class="profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </button>
                    <?php echo $username; ?>
                </a>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center w-75 menu-body">
        <form class="row g-3 needs-validation" method="POST" action="process.php" novalidate>
            <p class="col-md-12 fw-bold fs-4 text-center menu-headers">Menu</p>
            <div class="col-md-4 d-flex flex-column align-items-center justify-content-center card-menu">
                <img src="../src/<?php echo $kopi;?>.png" alt="Kopi-4" class="img-fluid img-menu">
                <h6 class="mt-3 text-center"><?php echo $result['nama_barang'];?></h6>
                <p class="text-center">Rp <text id="harga-kopi"><?php echo $result['harga_barang'];?></text></p>
            </div>
            <div class="col-md-8 ms-1 row g-3">
                <div class="col-md-12 row g-3 komponen">
                    <div class="col-md-4 d-flex align-items-center justify-content-start">
                        <div class="form-check fw-bold ps-3">
                            <p>Jenis Penyajian:</p>
                        </div>
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-evenly">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="saji" id="dinginpanas" value="Panas" onchange="hargaUpdater()" checked>
                            <label class="form-check-label" for="panas">
                                <p class="fw-bold">Hot</p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="saji" id="dinginpanas" value="Dingin" onchange="hargaUpdater()">
                            <label class="form-check-label" for="dingin">
                                <p class="fw-bold">Cold</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 row g-3 komponen">
                    <div class="col-md-4 d-flex align-items-center justify-content-start ps-4 fw-bold">
                        <p>Ukuran Cup:</p>
                    </div>
                    <div class="col-md-8 d-flex align-items-center justify-content-evenly">
                    <?php
                    for($i=1;isset($_SESSION['data-cup'][$i]['id_barang']);$i++){
                        if($_SESSION['data-cup'][$i]['stok_barang']>0){
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ukuran" value="<?php echo $i;?>" id="ukuran" onchange="updatevalcup(<?php echo $i;?>)" <?php if($i==1){echo 'checked';}?>>
                        <label class="form-check-label" for="<?php echo $i;?>">
                            <p class="fw-bold"><?php echo $_SESSION['data-cup'][$i]['nama_barang'];?></p>
                        </label>
                    </div>
                    <?php
                        } else {
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="ukuran" value="<?php echo $i;?>" id="ukuran" onchange="updatevalcup(<?php echo $i;?>)" disabled>
                        <label class="form-check-label" for="<?php echo $i;?>" style="color: grey;">
                            <p class="fw-bold"><?php echo $_SESSION['data-cup'][$i]['nama_barang'];?></p>
                        </label>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                </div>
                <div class="col-md-12 row g-3 d-flex align-items-center justify-content-center komponen">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="container text-center">
                            <label for="topping" class="form-label fw-bold">Pilih Topping</label>
                            <select name="topping" class="form-select w-75 mx-auto" id="topping" onchange="updatemax()" required>
                                <option value="1" selected><?php echo $_SESSION['data-topping'][1]['nama_barang'];?></option>
                                <?php
                                for($i=2;isset($_SESSION['data-topping'][$i]['id_barang']);$i++){
                                    if($_SESSION['data-topping'][$i]['stok_barang']>0){
                                ?>
                                <option value="<?php echo $i;?>"><?php echo $_SESSION['data-topping'][$i]['nama_barang'];?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <div class="container text-center">
                            <label for="jmlhtopping" class="form-label fw-bold">Metode Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="tunai" name="medpem" id="medpem" checked>
                                <label class="form-check-label" for="tunai">
                                    <p class="fw-bold">Tunai</p>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="non-tunai"  name="medpem" id="medpem">
                                <label class="form-check-label" for="nontunai">
                                    <p class="fw-bold">Non Tunai</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 row g-3 d-flex align-items-center justify-content-center">
                <div class="col-12">
                    <p class="garis container-expand-lg"></p>
                </div>
                <div class="col-md-6">
                    <p class="fw-bold fs-5">Total Harga: Rp <input type="text" id="harga" name="total" value="" readonly style="border:none;"></p>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-end">
                    <button type="submit" class="btn-mine text-dark fw-bold fs-5 w-25" name="proses">Proses</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>