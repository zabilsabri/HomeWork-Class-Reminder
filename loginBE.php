<?php
session_start();
include 'connection.php';

if (isset($_POST['login'])){
    
    $nama = $_POST['username'];
    $nis = $_POST['nis'];

    // AVOID SQL INJECTION
    $nama = stripcslashes($nama);
    $nis = stripcslashes($nis);

    $nama = mysqli_real_escape_string($conn, $nama);
    $nis = mysqli_real_escape_string($conn, $nis);

    if(!empty($nama) && !empty($nis)){
        $sql = mysqli_query($conn, "select st_id, NAMA, NIS from student_info where NAMA = '$nama'");

        $row = mysqli_fetch_array($sql);

        //$nis = $password;
        //$password = password_verify($nis, $row['nis']);

        if ($row['NAMA'] == $nama && $nis == $row['NIS']){
            $_SESSION['std_id'] = $row['st_id'];
            $_SESSION['login'] = true; 
            $_SESSION['nama'] = $nama;
            header('location: room.php');
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