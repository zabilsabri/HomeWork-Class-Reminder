<?php

session_start();
include 'connection.php';

if (isset($_POST['changeSetting'])){
    
    $rules_room = $_POST['roomRules'];
    $name_room = $_SESSION['name_room'];

    $sql = mysqli_query($conn, "UPDATE room SET Rules_Room='$rules_room' WHERE Name_Room='$name_room'");

    header("location: roomSetting.php");
    
} else {
    header("location: roomSetting.php");
}