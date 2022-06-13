<?php

include 'connection.php';

if(isset($_POST['submit_comment'])){
    
    $id_room = $_SESSION['id_room'];
    $comment = htmlspecialchars($_POST['comment']);
    $name = htmlspecialchars($_SESSION['nama']);

    $comment = stripcslashes($comment);
    $name = stripcslashes($name);

    $comment = mysqli_real_escape_string($conn, $comment);
    $name = mysqli_real_escape_string($conn, $name);

    $sql = "insert into comment_section(task_id, id_room, NAME, comment) values ($id_hw, $id_room, '$name', '$comment')";
    $send = mysqli_query($conn, $sql);

}