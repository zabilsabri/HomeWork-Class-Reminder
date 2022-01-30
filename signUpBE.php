<?php

include 'connection.php';

if(isset($_POST['register'])){
    $nama = $_POST['username'];
    //$password = $_POST['nis'];
    $password = password_hash($_POST['nis'], PASSWORD_DEFAULT);

    // AVOID SQL INJECTION
    $nama = stripcslashes($nama);
    $password = stripcslashes($password);
 
    $nama = mysqli_real_escape_string($conn, $nama);
    $password = mysqli_real_escape_string($conn, $password);
        
    $sqlc = mysqli_query($conn, "select NAMA from student_info where NAMA = '$nama'");
    $row = mysqli_fetch_array($sqlc);

    if(!empty($nama) && !empty($password)){

        if($row['NAMA'] != $nama){
            $sql = "insert into student_info (NAMA, NIS) values ('$nama', '$password')";
            if($conn->query($sql)){
                header('location: login.php');
            } else {
                header('location: signUp.php?failed');
            };
        } else {
            header('location: signUp.php?exist');
        };

    } else {
        header('location: signUp.php?empty');
    };
    
} else {
    header('location: signUp.php?notLogin');
};
