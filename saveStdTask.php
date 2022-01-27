<?php
include 'connection.php';

if(isset($_POST['saveStdTask'])){
    $id_room = $_SESSION['id_room'];
    $sql = mysqli_query($conn, "select img_id, NAME, grade from uploaded_image where id_id = '$id_room'");
    $row = mysqli_fetch_array($sql);
    $img_id = $row['img_id'];

    $grade = $_POST["grade"];

    $grade_insert = "insert into grade_path(grd_task, grd_room, grade) values ('$img_id','$id_room','$grade')";
    
    if($conn->query($grade_insert)){
        header('location: room.php?success');
    } else {
        header('location: room.php?failed');
    };
} else {
    header('location: tugas.php');
};
