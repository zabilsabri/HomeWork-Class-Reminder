<?php

session_start();
include 'connection.php';

$id_room = $_SESSION['id_room'];

if (isset($_POST['create'])){

    $nama = htmlspecialchars($_SESSION['nama']);
    $mapel = htmlspecialchars($_POST['mapel']);
    $deadline = htmlspecialchars($_POST['deadline']);
    $ket = htmlspecialchars($_POST['keterangan']);

    $mapel = stripcslashes($mapel);
    $deadline = stripcslashes($deadline);
    $ket = stripcslashes($ket);

    $mapel = mysqli_real_escape_string($conn, $mapel);
    $deadline = mysqli_real_escape_string($conn, $deadline);
    $ket = mysqli_real_escape_string($conn, $ket);

    $sqli = "insert into homework(NAMA, MAPEL, DEADLINE, KETERANGAN, id_room) values ('$nama', '$mapel', '$deadline', '$ket','$id_room')";
    if ($conn->query($sqli)){
        echo "<script> javascript:history.go(-1) </script>";
    } else {
        header('location: tugas.php?cfailed');
    };


};