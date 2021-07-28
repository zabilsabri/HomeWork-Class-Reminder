<?php

include 'connection.php';

if(isset($_POST['submit_comment'])){
    
    $comment = htmlspecialchars($_POST['comment']);
    $name = htmlspecialchars($_SESSION['nama']);
    $id = htmlspecialchars($_GET['id']);

    $comment = stripcslashes($comment);
    $name = stripcslashes($name);
    $id = stripcslashes($id);

    $comment = mysqli_real_escape_string($conn, $comment);
    $name = mysqli_real_escape_string($conn, $name);
    $id = mysqli_real_escape_string($conn, $id);

    $sql = "insert into comment_section(task_id, NAME, comment) values ($id, '$name', '$comment')";
    $send = mysqli_query($conn, $sql);

}