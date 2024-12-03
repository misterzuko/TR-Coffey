<?php
include 'connect.php';
session_start();
function updatedata($banyakCup,$banyakkopi,$banyaktopping){
    include 'connect.php';
    $query = "SELECT MAX(id_barang) AS banyakdata FROM tb_barang;";
    $sql = mysqli_query($conn,$query);
    $banyakData = mysqli_fetch_assoc($sql)['banyakdata'];
    for($i=1;$i<=$banyakData;$i++){
        $query = "SELECT * FROM tb_barang WHERE id_barang='$i' AND nama_barang LIKE '%Kopi%'";
        $sql = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($sql);
        if($result!=NULL){
            $banyakkopi++;
            $_SESSION['data-kopi'][$banyakkopi]=$result;
            continue;
        }
        $query = "SELECT * FROM tb_barang WHERE id_barang='$i' AND nama_barang LIKE '%Cup%'";
        $sql = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($sql);
        if($result!=NULL){
            $banyakCup++;
            $_SESSION['data-cup'][$banyakCup]=$result;
            continue;
        }
        $query = "SELECT * FROM tb_barang WHERE id_barang='$i' AND nama_barang LIKE '%Topping%'";
        $sql = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($sql);
        if($result!=NULL){
            $banyaktopping++;
            $_SESSION['data-topping'][$banyaktopping]=$result;
            continue;
        }
    }
}
        if(isset($_POST['login'])){   
            try{
            $email = $_POST['email'];
            $password = $_POST['pw'];
            $query = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
            $sql = mysqli_query($conn,$query);
            $result = mysqli_fetch_assoc($sql);
            if($result!=null){
                if($result['email']=="admin@local.com" and $result['password']=="ADMIN#1234"){
                    header('location: admins.php?edit');
                } else {
                $query = "SELECT email,username FROM tb_akun WHERE email='$email' AND password='$password'";
                $sql = mysqli_query($conn,$query);
                $result = mysqli_fetch_assoc($sql);
                $_SESSION['credential']=$result;
                $banyakkopi=0;
                $banyaktopping=0;
                $banyakCup=0;
                updatedata($banyakCup,$banyakkopi,$banyaktopping);
                header('location: user.php');
                } 
            } else {
                $_SESSION['gagal']="ADA";
                header('location: index.php');
            }
            }
            catch(Exception $e){
                echo "error".$e;
            }
        } elseif (isset($_POST['register'])) {
            try{
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['pw'];
            $query = "INSERT INTO `tb_akun` (`email`, `username`, `password`) VALUES ('$email', '$username', '$password');";
            $sql = mysqli_query($conn,$query);
            if($sql){
                $_SESSION['berhasil']="ADA";
                header('location: index.php');
            } else {
                $_SESSION['dahada']="ADA";
                header('location: signup.php');
            }
            } catch(mysqli_sql_exception $e){
                $_SESSION['dahada']="ADA";
                header('location: signup.php');
            }
            
        } elseif (isset($_POST['proses'])){
            try {
                $email = $_SESSION['credential']['email'];
                $jenis_penyajian = $_POST['saji'];
                $idKopi = $_SESSION['saved-menu']['id_barang'];
                $idCup = $_SESSION['data-cup'][$_POST['ukuran']]['id_barang'];
                $idTopping = $_SESSION['data-topping'][$_POST['topping']]['id_barang'];
                $total = $_POST['total'];
                $metode_pembayaran = $_POST['medpem'];
                $status_pesanan = "Diproses";
                if($_SESSION['data-cup'][$_POST['ukuran']]['stok_barang']>0&&$_SESSION['saved-menu']['stok_barang']>0&&$_SESSION['data-topping'][$_POST['topping']]['stok_barang']>0){
                    try{
                $query = "INSERT INTO `tb_recordhistory`( `email`, `nama_pemesan`, `jenis_kopi`, `jenis_penyajian`, `jenis_topping`, `ukuran_cup`, `total`,`metode_pembayaran`, `status_pesanan`) VALUES ('$email',(SELECT `username` FROM `tb_akun` WHERE `email`='$email'),(SELECT `nama_barang` FROM `tb_barang` WHERE `id_barang`='$idKopi'),'$jenis_penyajian',(SELECT `nama_barang` FROM `tb_barang` WHERE `id_barang`='$idTopping'),(SELECT `nama_barang` FROM `tb_barang` WHERE `id_barang`='$idCup'),'$total','$metode_pembayaran','$status_pesanan');";
                $sql = mysqli_query($conn,$query);
                $query = "UPDATE `tb_barang` SET `stok_barang`= stok_barang-1 WHERE `id_barang`='$idKopi' OR `id_barang`='$idCup' OR `id_barang`='$idTopping';";
                $sql = mysqli_query($conn,$query);
                $_SESSION['berhasil']="Pemesanan ".$_SESSION['saved-menu']['nama_barang']." ".$jenis_penyajian.", ukuran ".$_SESSION['data-cup'][$_POST['ukuran']]['nama_barang']." dengan ".$_SESSION['data-topping'][$_POST['topping']]['nama_barang']." Berhasil di proses (Total Harga: ".$total.")";
                updatedata($banyakCup,$banyakkopi,$banyaktopping);
                unset($_SESSION['kopi-pilihan']);
                    }
                    catch (mysqli_sql_exception $e){
                        $_SESSION['kesalahan']="Terjadi kesalahan query".$e;
                        header('location: menu.php');
                    }
                } else {
                    $_SESSION['stokhabis'] = "Stok ";
                    if ($_SESSION['data-cup'][$_POST['ukuran']]['stok_barang'] <= 0) {
                        $_SESSION['stokhabis'] .= "cup, ";
                    } 
                    if ($_SESSION['saved-menu']['stok_barang'] <= 0) {
                        $_SESSION['stokhabis'] .="kopi, ";
                    }
                    if ($_SESSION['data-topping'][$_POST['topping']]['stok_barang'] <= 0) {
                        $_SESSION['stokhabis'] .= "topping, ";
                    }
                    $_SESSION['stokhabis'].="Yang anda beli habis, mohon coba lagi";
                }
                header('location: menu.php');
            } catch(mysqli_sql_exception $e){
                echo $e;
            }
        }
?>