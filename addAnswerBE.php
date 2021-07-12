<?php


include 'connection.php';

if (isset($_POST['submit-answer'])){

    $id = $_GET['id'];
    $answer = $_POST['answer-pic'];

    $sql = mysqli_query($conn, "update homework set task_picture = '$answer' where hw_id = '$id'");


};
