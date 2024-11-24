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
                for($i=1;$result!=NULL;$i++){
                    $query = "SELECT * FROM tb_barang WHERE id_barang='$i' AND nama_barang LIKE '%Kopi%'";
                    $sql = mysqli_query($conn,$query);
                    $result = mysqli_fetch_assoc($sql);
                    if($result!=NULL){
                        $_SESSION['data-Kopi'][$i]=$result;
                        continue;
                    }
                    $query = "SELECT * FROM tb_barang WHERE id_barang='$i' AND nama_barang LIKE '%Es%'";
                    $sql = mysqli_query($conn,$query);
                    $result = mysqli_fetch_assoc($sql);
                    if($result!=NULL){
                        $_SESSION['data-Es'][$i]=$result;
                        continue;
                    }
                    $query = "SELECT * FROM tb_barang WHERE id_barang='$i' AND nama_barang LIKE '%Cup%'";
                    $sql = mysqli_query($conn,$query);
                    $result = mysqli_fetch_assoc($sql);
                    if($result!=NULL){
                        $_SESSION['data-Cup'][$i]=$result;
                        continue;
                    }
                }
                // for ($i=1; $i < 7; $i++) { 
                //     echo $_SESSION['data-kopi'][$i]['nama_barang']."<br>";
                // }
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
            echo "Register berhasil bjir";
            } catch(Exception $e){
                echo "error".$e;
            }
        }
        if (isset($_POST['register'])) {
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
            
        }
?>