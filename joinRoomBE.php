<?php

session_start();
include 'connection.php';

if (isset($_POST['joinRoom'])){
    $name = $_SESSION['nama'];

    $roomName = htmlspecialchars($_POST['roomName']);
    $roomPassword = htmlspecialchars($_POST['roomPassword']);

    $roomName = stripcslashes($roomName);
    $roomPassword = stripcslashes($roomPassword);

    $roomName = mysqli_real_escape_string($conn, $roomName);
    $roomPassword = mysqli_real_escape_string($conn, $roomPassword);


    if(!empty($roomName) && !empty($roomPassword)){
            $sqlc = mysqli_query($conn, "select id_room, Name_Room, room_password from room where Name_Room = '$roomName' and room_password = '$roomPassword'");
            $row = mysqli_fetch_array($sqlc);


            if($row['Name_Room'] == $roomName && $row['room_password'] == $roomPassword){
                $_SESSION["id_room"] = $row['id_room'];    
                $_SESSION["name_room"] = $row['Name_Room'];       
                header('location: tugas.php');
            } else {
                header('location: joinRoom.php?wrong');
            };
    } else {
        header('location: joinRoom.php?empty');
    };
            
};