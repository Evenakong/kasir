<?php

session_start();

//Bikin koneksi
$conn = mysqli_connect('localhost','root','','kasir');

//Login
if(isset($_POST['login'])){
    //initiate variable
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check  = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        //Jika datanya ditemukan
        //berhasil login

        $_SESSION['login'] = 'True';
        header('location:index.php');
    }else {
        //Data tidak ditemukan
        //gagal login
        echo '
        <script>alert("Username atau Password salah");
        window.location.href="login.php"
        </script>
        ';
    }
}


if(isset($_POST['tambahbarang'])){
    $namaproduk  = $_POST['namaproduk'];
    $deskripsi   = $_POST['deskripsi'];
    $stock       = $_POST['stock'];
    $harga       = $_POST['harga'];

    $insert      = mysqli_query($conn,"insert into produk (namaproduk,deskripsi,harga,stock) values ('$namaproduk', '$deskripsi', '$harga', '$stock')");

    if($insert){
        header('location:stock.php');
    }else{
        echo '
        <script>alert("Gagal menambah barang baru");
        window.location.href="stock.php"
        </script>
        ';
    }
}

?> 