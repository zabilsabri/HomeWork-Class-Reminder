<?php

session_start();
include 'connection.php';

if (isset($_POST['createRoom'])){
    $name = $_SESSION['nama'];

    $roomName = $_POST['roomName'];
    $roomPassword = password_hash($_POST['roomPassword'], PASSWORD_DEFAULT);

    $roomName = htmlspecialchars($roomName);
    $roomPassword = htmlspecialchars($roomPassword);

    $roomName = stripcslashes($roomName);
    $roomPassword = stripcslashes($roomPassword);

    $roomName = mysqli_real_escape_string($conn, $roomName);
    $roomPassword = mysqli_real_escape_string($conn, $roomPassword);


    
            $sqlc = mysqli_query($conn, "select Name_Room from room where Name_Room = '$roomName'");
            $row = mysqli_fetch_array($sqlc);


            if($row['Name_Room'] == $roomName){
                header('location: createRoom.php?exist');
            } else {
                $sql = "insert into room(creator, Name_Room, room_password) values ('$name','$roomName','$roomPassword')";
                
                if($conn->query($sql)){
                    $sqls = mysqli_query($conn, "select id_room, creator, Name_Room from room where Name_Room = '$roomName'");
                    $row = mysqli_fetch_array($sqls);

                    $std_id = $_SESSION['std_id'];
                    $id_room = $row['id_room'];

                    if($row['creator'] == $name){
                        $sqlm = "insert into room_path(std_id, r_id, status) values ('$std_id','$id_room', 'admin')";
                    } else {
                        $sqlm = "insert into room_path(std_id, r_id, status) values ('$std_id','$id_room', 'member')";
                    }
                
                    if($conn->query($sqlm)){
                        header('location: room.php?success');
                    } else {
                        header('location: room.php?failed');
                    };

                } else {
                    header('location: createRoom.php?failed');
                };
            };
        
};