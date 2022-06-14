<?php

session_start();
include 'connection.php';

$id_room = $_SESSION['id_room'];
$hw_id = $_GET['hw_id'];

if (isset($_POST['create'])){

    $mapel = htmlspecialchars($_POST['mapel']);
    $deadline = htmlspecialchars($_POST['deadline']);
    $ket = htmlspecialchars($_POST['keterangan']);

    $mapel = stripcslashes($mapel);
    $deadline = stripcslashes($deadline);
    $ket = stripcslashes($ket);

    $mapel = mysqli_real_escape_string($conn, $mapel);
    $deadline = mysqli_real_escape_string($conn, $deadline);
    $ket = mysqli_real_escape_string($conn, $ket);

    $sqli = "update homework set Mapel = '$mapel', DEADLINE = '$deadline', KETERANGAN = '$ket' where hw_id = '$hw_id'";
    if ($conn->query($sqli)){
        echo "<script> javascript:history.go(-1) </script>";
    } else {
        header('location: tugas.php?cfailed');
    };


};