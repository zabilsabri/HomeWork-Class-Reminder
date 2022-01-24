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
            $sqlc = mysqli_query($conn, "select id_room, creator, Name_Room, room_password, Rules_Room from room where Name_Room = '$roomName'");
            $row = mysqli_fetch_array($sqlc);

            $id_room = $row['id_room'];
            $std_id = $_SESSION['std_id'];

            //$roomPasswordVerify = $row['room_password'];
            $roomPasswordVerify = password_verify($roomPassword, $row['room_password']);

            if($row['Name_Room'] == $roomName && $roomPasswordVerify == $roomPassword){
                if($row['creator'] == $name){
                    $sql = "insert into room_path(std_id, r_id, status) values ('$std_id','$id_room', 'admin')";
                } else {
                    $sql = "insert into room_path(std_id, r_id, status) values ('$std_id','$id_room', 'member')";
                }
                
                if($conn->query($sql)){
                    header('location: room.php?success');
                } else {
                    header('location: room.php?failed');
                };
                
            } else {
                header('location: joinRoom.php?wrong');
            };
    } else {
        header('location: joinRoom.php?empty');
    };
            
};