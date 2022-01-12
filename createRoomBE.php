<?php

session_start();
include 'connection.php';

if (isset($_POST['createRoom'])){
    $name = $_SESSION['nama'];

    $roomRules = $_POST['roomRules'];

    $roomName = htmlspecialchars($_POST['roomName']);
    $roomPassword = htmlspecialchars($_POST['roomPassword']);

    $roomName = stripcslashes($roomName);
    $roomPassword = stripcslashes($roomPassword);

    $roomName = mysqli_real_escape_string($conn, $roomName);
    $roomPassword = mysqli_real_escape_string($conn, $roomPassword);


    if(!empty($roomName) && !empty($roomPassword)){
            $sqlc = mysqli_query($conn, "select Name_Room from room");
            $row = mysqli_fetch_array($sqlc);


            if($row['Name_Room'] == $roomName){
                header('location: createRoom.php?exist');
            } else {
                $sql = "insert into room(creator, Name_Room, room_password, Rules_Room) values ('$name','$roomName','$roomPassword','$roomRules')";
                
                if($conn->query($sql)){
                    $sqls = mysqli_query($conn, "select id_room, Name_Room, Rules_Room from room where Name_Room = '$roomName'");
                    $row = mysqli_fetch_array($sqls);

                    $_SESSION["id_room"] = $row['id_room'];
                    $_SESSION["name_room"] = $row['Name_Room'];
                    $_SESSION["rules_room"] = $row['Rules_Room'];

                    header('location: createSubject.php');
                } else {
                    header('location: createRoom.php?failed');
                };
            };
    } else {
        header('location: createRoom.php?empty');
    };
            
};