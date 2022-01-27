<?php
include 'connection.php';
session_start();

if(isset($_POST['saveStdTask'])){
    
    $id_room = $_SESSION['id_room'];
    $sql = mysqli_query($conn, "select img_id, NAME, grade from uploaded_image where id_id = '$id_room'");
    $rowg = mysqli_num_rows($sql);

    while($row = mysqli_fetch_array($sql)){
        
        $img_id = $row['img_id'];

        $grade = $_POST['grade'.$img_id];

        echo $grade;

        $query = mysqli_query($conn, "UPDATE uploaded_image SET grade='$grade' WHERE img_id='$img_id'");
    }
   
} else {
    header('location: tugas.php');
};
