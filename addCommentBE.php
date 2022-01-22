<?php

include 'connection.php';

if(isset($_POST['submit_comment'])){
    
    $comment = htmlspecialchars($_POST['comment']);
    $name = htmlspecialchars($_SESSION['nama']);

    $comment = stripcslashes($comment);
    $name = stripcslashes($name);

    $comment = mysqli_real_escape_string($conn, $comment);
    $name = mysqli_real_escape_string($conn, $name);

    $sql = "insert into comment_section(task_id, NAME, comment) values ($id_hw, '$name', '$comment')";
    $send = mysqli_query($conn, $sql);

}