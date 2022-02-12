<?php

session_start();
include 'connection.php';

if (isset($_POST['changeSetting'])){
    
    $name_room_updt = $_POST['name_room'];
    $name_room = $_SESSION['name_room'];

    $sql = mysqli_query($conn, "UPDATE room SET Name_Room='$name_room_updt' WHERE Name_Room='$name_room'");

    header("location: roomSetting.php?success");
    
} else {
    header("location: roomSetting.php");
}