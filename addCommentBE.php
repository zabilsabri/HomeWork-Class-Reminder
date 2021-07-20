<?php


include 'connection.php';

if(isset($_POST['submit_comment'])){
    
    $comment = $_POST['comment'];
    $name = $_SESSION['nama'];
    $id = $_GET['id'];

    $sql = "insert into comment_section(task_id, NAME, comment) values ($id, '$name', '$comment')";
    $send = mysqli_query($conn, $sql);

}