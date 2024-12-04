<?php
include 'connect.php';
session_start();
function updatedataAdmin(){
    include 'connect.php';
    unset($_SESSION['data-admin']);
    $query = "SELECT MAX(id_barang) AS banyakdata FROM tb_barang;";
    $sql = mysqli_query($conn,$query);
    $banyakData = mysqli_fetch_assoc($sql)['banyakdata'];
    $data=0;
    for($i=0;$i<=$banyakData;$i++){
        $query = "SELECT * FROM tb_barang WHERE id_barang='$i'";
        $sql = mysqli_query($conn,$query);
        $result = mysqli_fetch_assoc($sql);
        if($result!=NULL){
        $_SESSION['data-admin'][$data]=$result;
        $data++;
        }
    }
}
function updatedata(){
    $banyakkopi=0;
    $banyaktopping=0;
    $banyakCup=0;
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
    $query = "SELECT MAX(id_pesanan) AS banyakRecord FROM tb_recordhistory;";
    $sql = mysqli_query($conn,$query);
    $banyakRecord = mysqli_fetch_assoc($sql)['banyakRecord'];
    $email = $_SESSION['credential']['email'];
    $recordCounter=0;
    for($i=0;$i<=$banyakRecord;$i++){
        $query = "SELECT * FROM tb_recordhistory WHERE id_pesanan='$i' AND email='$email';";
        $sql = mysqli_query($conn,$query);
        $res = mysqli_fetch_assoc($sql);
        if($res!=NULL){
            $_SESSION['history'][$recordCounter]=$res;
            $recordCounter++;
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
                if($result['role'] == 'ADMIN'){
                    updatedataAdmin();
                    header('location: admins.php');
                } elseif ($result['role'] == 'KASIR') {
                    header('location: kasir.php');
                } 
                else {
                $query = "SELECT email,username FROM tb_akun WHERE email='$email' AND password='$password'";
                $sql = mysqli_query($conn,$query);
                $result = mysqli_fetch_assoc($sql);
                $_SESSION['credential']=$result;
                updatedata();
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
            $query = "INSERT INTO tb_akun (email, username, password, role) VALUES ('$email', '$username', '$password', 'USER');";
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
                $query = "INSERT INTO tb_recordhistory( email, nama_pemesan, jenis_kopi, jenis_penyajian, jenis_topping, ukuran_cup, total,metode_pembayaran, status_pesanan) VALUES ('$email',(SELECT username FROM tb_akun WHERE email='$email'),(SELECT nama_barang FROM tb_barang WHERE id_barang='$idKopi'),'$jenis_penyajian',(SELECT nama_barang FROM tb_barang WHERE id_barang='$idTopping'),(SELECT nama_barang FROM tb_barang WHERE id_barang='$idCup'),'$total','$metode_pembayaran','$status_pesanan');";
                $sql = mysqli_query($conn,$query);
                $query = "UPDATE tb_barang SET stok_barang= stok_barang-1 WHERE id_barang='$idKopi' OR id_barang='$idCup' OR id_barang='$idTopping';";
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
        } elseif(isset($_GET['profile'])){
            updatedata();
            header('location: profile.php');
        } elseif(isset($_GET['updateMenu'])){
            updatedata();
            header('location: menu.php');
        } elseif(isset($_GET['updateUser'])){
            updatedata();
            header('location: user.php');
        } elseif(isset($_GET['updateAdmins'])){
            updatedata();
            header('location: admins.php');
        } elseif(isset($_POST['aksi'])){
            if($_POST['aksi']=='add'){
    $nama = $_POST['nama_barang'];
$harga = $_POST['harga_barang'];
$stok = $_POST['stok_barang'];
$jenis = $_POST['jenis_barang'];
$source = $_FILES['link_gambar'];
if(isset($_FILES['link_gambar'])){
    $query = "SELECT MAX(id_barang)+1 AS banyakdata FROM tb_barang;";
    $sql = mysqli_query($conn,$query);
    $banyakData = mysqli_fetch_assoc($sql)['banyakdata'];
    $source=$_FILES['link_gambar']['tmp_name'];
    $file_extension = pathinfo($_FILES['link_gambar']['name'], PATHINFO_EXTENSION);
    $destination="../src/".$banyakData.".".$file_extension;
    if(!move_uploaded_file($source,$destination)){
        $link="";
    } else $link=$destination;
} else $link="";
    $_nama = $jenis." ".$nama;
    $query = "INSERT INTO `tb_barang`(`nama_barang`, `harga_barang`, `stok_barang`, `link_gambar`) VALUES ('$_nama','$harga','$stok','$link')";
    $sql = mysqli_query($conn,$query);
    updatedataAdmin();
    header('location: admins.php?addberhasil');
}
        } elseif(isset($_GET['hapus'])){
            $id = $_GET['hapus'];
            $_SESSION['terhapus'] = "DATA ITEM DENGAN ID = ".$_GET['hapus']." BERHASIL DI HAPUS";
            $query = "DELETE FROM tb_barang WHERE id_barang='$id'";
            $sql = mysqli_query($conn,$query);
            header('location: admins.php');
        }
?>