<?php

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};

if($_SESSION['id_room'] == null){
    header('location: room.php?!');
}

$std_id_main = $_SESSION['std_id'];
$id_room_main = $_SESSION['id_room'];

$sql_main = mysqli_query($conn, "select std_id, r_id from room_path where std_id = $std_id_main and r_id = $id_room_main");
$row = mysqli_fetch_assoc($sql_main);


$sql_sec = mysqli_query($conn, "select * from room where id_room = $id_room_main");
$row_sec = mysqli_fetch_assoc($sql_sec);

