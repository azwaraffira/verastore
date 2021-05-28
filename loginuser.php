<?php
session_start();
include "lib/config_web.php";
include "lib/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_array($query);
$jml_data = mysqli_num_rows($query);


if($jml_data==1){
$_SESSION['username']=$data['username'];
$_SESSION['password']=$data['password'];
echo "<script> alert('Login Berhasil'); window.location ='$web_url'+'index.php';</script>";
        //header('location:../../index.php?module=home');
    } else {
         echo "<script> alert('Login Gagal'); window.location ='login.php';</script>";
    }
?>