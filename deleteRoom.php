<?php

session_start();
include 'connection.php';

$idR = $_GET['idR'];
$nama = $_SESSION['nama'];

$id_room_decrypt = base64_decode(urldecode($idR));
$id_room_float = ((((int)$id_room_decrypt * '26091971')/'08082020')/'10052003');
$id_room = round($id_room_float);

echo $id_room;

$sql = mysqli_query($conn, "delete from room where id_room = '$id_room'");
$sql2 = mysqli_query($conn, "delete from homework where id_room = '$id_room'");
$sql3 = mysqli_query($conn, "delete from grade_path where grd_room = '$id_room'");
$sql4 = mysqli_query($conn,"delete from room_path where r_id = $id_room");
$sql5 = mysqli_query($conn, "delete from uploaded_image where id_room = $id_room");

header('location: room.php');

?>