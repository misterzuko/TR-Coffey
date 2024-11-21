<?php
    include 'connect.php';
        if(isset($_POST['login'])){
            try{
            $email = $_POST['email'];
            $password = $_POST['pw'];
            $query = "SELECT * FROM tb_akun WHERE email='$email' AND password='$password'";
            $sql = mysqli_query($conn,$query);
            $result = mysqli_fetch_assoc($sql);
            if($result!=null){
                if($result['username']=="ADMIN" and $result['password']=="ADMIN#1234"){
                    header('location: admin.php');
                } else {
                $query = "SELECT email,username FROM tb_akun WHERE email='$email' AND password='$password'";
                $sql = mysqli_query($conn,$query);
                session_start();
                $result = mysqli_fetch_assoc($sql);
                $_SESSION['credential']=$result;
                header('location: user.php');
                }
            } else {
                header('location: login.php?errorlog');
            }
            // header('user.php');
            }
            catch(Exception $e){
                echo "error".$e;
            }
        } elseif (isset($_POST['register'])) {
            try{
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['pw'];
            $query = "INSERT INTO tb_akun(email,username,password) VALUES ('$email','$username','$password')";
            echo "Register berhasil bjir";
            } catch(Exception $e){
                echo "error".$e;
            }
        }
?>