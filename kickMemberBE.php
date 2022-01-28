<?php

session_start();
include 'connection.php';

if(isset($_GET['id'])){
$id_pstd_ecrypt = base64_decode(urldecode($_GET['id']));
$id = ((($id_pstd_ecrypt * '26091971')/'08082020')/'10052003');

$std_id = $_SESSION['std_id'];

$sql = mysqli_query($conn, "select * from room_path where std_id = '$std_id' and p_id = '$id'");
$row = mysqli_fetch_array($sql);


if (isset($_SESSION['admin'])){
    $sqli = mysqli_query($conn, "delete from room_path where p_id = $id");
    echo "<script> javascript:history.go(-1) </script>";
} 

elseif($std_id == $row['std_id']){
    $sqli = mysqli_query($conn, "delete from room_path where p_id = $id");
    header('location: room.php');
}

else {
    echo "<script> javascript:history.go(-1) </script>";
};

} else {
    echo "<script> javascript:history.go(-1) </script>";
};
?>