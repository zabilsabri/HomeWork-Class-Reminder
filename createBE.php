<?php

session_start();
include 'connection.php';

if (isset($_POST['create'])){

    $mapel = $_POST['mapel'];
    $deadline = $_POST['deadline'];
    $ket = $_POST['keterangan'];

    $sqli = "insert into homework(MAPEL, DEADLINE, KETERANGAN) values ('$mapel', '$deadline', '$ket')";
    if ($conn->query($sqli)){
        echo "berhasil";
    } else {
        echo "failed";
    };


};