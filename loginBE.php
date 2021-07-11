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
        $sql = mysqli_query($conn, "select NAMA, NIS from student_info where NAMA = '$nama' and NIS = '$nis'");
        $sqlc = mysqli_query($conn, "select * from subject");

        $row = mysqli_fetch_array($sql);
        $rowc = mysqli_fetch_array($sqlc);

        $_SESSION['nama'] = $nama;
        

        if ($row['NAMA'] == $nama && $row['NIS'] == $nis){
            if ($rowc['sb_id'] <= 0){
                $_SESSION['login'] = true; 
                header('location: createSubjectBE.php');
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