<?php

session_start();
include 'connection.php';

if (isset($_POST['create'])){

    $nama = $_SESSION['nama'];
    $mapel = $_POST['mapel'];
    $deadline = $_POST['deadline'];
    $ket = $_POST['keterangan'];

    $sqli = "insert into homework(NAMA, MAPEL, DEADLINE, KETERANGAN) values ('$nama', '$mapel', '$deadline', '$ket')";
    if ($conn->query($sqli)){
        header('location: tugas.php');
    } else {
        header('location: tugas.php?cfailed');
    };


};