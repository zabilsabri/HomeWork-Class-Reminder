<?php

session_start();
include 'connection.php';

$id = $_GET['id'];
$nama = $_SESSION['nama'];
$name_room = $_SESSION['name_room'];

$id_moreInfo_ecrypt = (($_SESSION['id_room'] * '10052003' * '08082020')/'26091971');
$link = "tugas.php?id_r=".urlencode(base64_encode($id_moreInfo_ecrypt));

$sql = mysqli_query($conn, "select NAMA from homework where hw_id = '$id'");
$sql2 = mysqli_query($conn, "select creator, Name_Room from room where Name_Room = '$name_room'");


$row = mysqli_fetch_array($sql);
$rowc = mysqli_fetch_array($sql2);

if ($row['NAME'] == $nama || $rowc['creator'] == $nama || $_SESSION["rules_room"] == 0){
    $sqli = mysqli_query($conn, "delete from homework where hw_id = $id");
    header("location: allTaskADM.php");

} else {
    
    echo "
    <script>
        alert('ANDA BUKAN PEMILIK TUGAS!')
        javascript:history.go(-1)
    </script>
    
    ";
};

?>