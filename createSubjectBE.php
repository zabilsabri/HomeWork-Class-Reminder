<?php

session_start();
include 'connection.php';

if (isset($_POST['addSubject'])){
    $name = $_SESSION['nama'];
    $id_room = $_SESSION['id_room'];

    $subject = htmlspecialchars($_POST['subject']);

    $subject = stripcslashes($subject);

    $subject = mysqli_real_escape_string($conn, $subject);

    if(!empty($subject)){
        $sql = "insert into subject(NAME, subject, id_room) values ('$name','$subject','$id_room')";

        if($conn->query($sql)){
            header('location: createSubject.php?success');
        } else {
            header('location: createSubject.php?failed');
        };

    } else {
        header('location: createSubject.php?empty');
    };


};