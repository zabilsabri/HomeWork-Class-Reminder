<?php
session_start();
include 'connection.php';

$admin = 181175;

if (isset($_POST['login'])){
    
    $nama = $_POST['username'];
    $nis = $_POST['nis'];

    // AVOID SQL INJECTION
    $nama = stripcslashes($nama);
    $nis = stripcslashes($nis);

    $nama = mysqli_real_escape_string($conn, $nama);
    $nis = mysqli_real_escape_string($conn, $nis);

    if(!empty($nama) && !empty($nis)){
        $sql = mysqli_query($conn, "select NAMA, NIS from student_info where NAMA = '$nama' and NIS = '$nis'");

        $row = mysqli_fetch_array($sql);

        $_SESSION['nama'] = $nama;

        if ($row['NAMA'] == $nama && $row['NIS'] == $nis){
            if($nis == $admin){
                $_SESSION['admin'] = true;
                $_SESSION['login'] = true; 
                header('location: tugas.php');
            } else {
                $_SESSION['login'] = true; 
                header('location: tugas.php');
            };
    
        } else {
            header('location: login.php?wrong');
        };
    } else {
        header('location: login.php?empty');
    };
    
} else {
    header("location: login.php?notlogin");
};


?>