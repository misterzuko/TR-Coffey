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
                echo "Anda login sebagai ".$result['username'];
                $query = "SELECT email,username FROM tb_akun WHERE email='$email' AND password='$password'";
                $sql = mysqli_query($conn,$query);
                session_start();
                $result = mysqli_fetch_assoc($sql);
                $_SESSION['credential']=$result;
                header('location: user.php');
            } else {
                header('location: login.php?errorlog');
            }
        } catch(Exception $e){
            echo "error".$e;
        }
    }
?>