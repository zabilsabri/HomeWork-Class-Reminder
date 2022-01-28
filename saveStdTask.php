<?php
include 'connection.php';
session_start();

if(isset($_POST['saveStdTask'])){
    
    $id_room = $_SESSION['id_room'];
    $sql = mysqli_query($conn, "select img_id, NAME from uploaded_image where id_id = '$id_room'");

    while($row = mysqli_fetch_array($sql)){
        
        $img_id = $row['img_id'];

        $grade = $_POST['grade'.$img_id];

        $query = mysqli_query($conn, "insert into grade_path(grd_task, grd_room, grade) values ($img_id, $id_room, $grade)");
        
        echo " <script>javascript:history.go(-1)</script>";
    }
   
} else {
    header('location: tugas.php');
};
