<?php
// untuk memasukkan file koneksi.php
include "include/koneksi.php";
include "include/config.php";
// menangkap variabel POST dari form login / index.php

session_start();
//$sid = session_id();
// pastikan username dan password adalah berupa huruf atau angka.
 if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = mysql_query("SELECT * FROM customer WHERE email = '$email' AND password = '$password'");
   

    // Apabila username dan password ditemukan
    if (mysql_num_rows($sql) == 1) {
        
        $r=mysql_fetch_array($sql);

        $_SESSION["idm"] = $r["Id_member"];
        $_SESSION["name"] = $r["username"];


        header('location:indexmember.php');

  
    }else {
        
        echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
    echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    
  }
} else {
        
        echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
    echo "<a href=login.php><b>ULANGI LAGI</b></a></center>";
    }
  


?>
