<?php
    include 'connect.php';
    session_start();
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
                header('location: user.php');
                } 
            } else {
                $_SESSION['gagal']="ADA";
                header('location: login.php');
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
                header('location: login.php');
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
                $nama = $_SESSION['credential']['username'];
                $jenis_kopi = $_SESSION['saved-menu']['nama_barang'];
                $jenis_penyajian = $_POST['saji'];
                $jenis_topping = $_SESSION['data-topping'][$_POST['topping']]['nama_barang'];
                $ukuran_cup = $_POST['ukuran'];
                $total = $_POST['total'];
                $metode_pembayaran = $_POST['medpem'];
                $status_pesanan = "Diproses";
                $query = "INSERT INTO `tb_recordhistory`(`nama_pemesan`, `jenis_kopi`, `jenis_penyajian`, `jenis_topping`, `ukuran_cup`, `total`, `metode_pembayaran`, `status_pesanan`) VALUES ('$nama','$jenis_kopi','$jenis_penyajian','$jenis_topping','$ukuran_cup','$total','$metode_pembayaran','$status_pesanan');";
                $sql = mysqli_query($conn,$query);
                $_SESSION['berhasil']="yes";
                header('location: user.php');
            } catch(mysqli_sql_exception $e){
                echo $e;
            }
        }
?>