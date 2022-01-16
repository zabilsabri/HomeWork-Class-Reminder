<?php

include 'connection.php';

switch ($_POST['action']){
    case 'registration':
        $nama = $_POST['username'];
        $password = password_hash($_POST['nis'], PASSWORD_DEFAULT);
        
        $sqlc = mysqli_query($conn, "select NAMA from student_info where NAMA = '$nama'");
        $row = mysqli_fetch_array($sqlc);

        if($row['NAMA'] != $nama){
            $sql = "insert into student_info (NAMA, NIS) values ('$nama', '$password')";
            if($conn->query($sql)){
                header('location: login.php');
            } else {
                header('location: signUp.php?failed');
            };
        } else {
            header('location: signUp.php?exist');
        }
        break;
    case 'login':
        $nama = $_POST['username'];
        $password = $_POST['nis'];

        $sqli = mysqli_query($conn, "select NAMA, NIS from student_info where NAMA = '$nama'");
        $row = mysqli_fetch_array($sqli);

        $password = password_verify($password, $row['NIS']);
        if($password == $row['NIS']){
            header('location: login.php?success');
        }


    default:
        #code
        break;
}