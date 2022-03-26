<?php

session_start();
include 'connection.php';
include "roomSecurity.php";

if(!isset($_SESSION['admin'])){
    header("location: memberRoom.php");
};

$p_id = $_GET['p_id'];

$id_room = $_SESSION['id_room'];

$sql_room = mysqli_query($conn, "select p_id, std_id, join_room_time from room_path where p_id = $p_id");
$fetch_room = mysqli_fetch_array($sql_room);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="stdDetails.css">
    <title>PROFILE</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="heading">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a href="profile.php">
                    <h1>PROFILE</h1>
                </a>
                <button type="button" class="btn btn-danger">KICK</button>
            </div>
        </nav>
    </div>

    <?php
    
    $std_id = $fetch_room['std_id'];
    $sql_profile = mysqli_query($conn, "select * from student_info where st_id = $std_id");
    $fetch_profile = mysqli_fetch_array($sql_profile);

    $joinOn = strtotime($fetch_room['join_room_time']);
    $datetimeCO = date("d/m/Y H:i:s", $joinOn);
    
    $sql_task = mysqli_query($conn, "select img_id from uploaded_image where std_id = $std_id and id_room = $id_room");
    $sum_grade = 0;
    
    while($fetch_task = mysqli_fetch_array($sql_task)){
        $img_id = $fetch_task['img_id'];
        $sql_grade = mysqli_query($conn, "select grade from grade_path where grd_task = $img_id");
        $fetch_grade = mysqli_fetch_array($sql_grade);
        $task_grade = $fetch_grade['grade'];
        $sum_grade = $sum_grade + $task_grade;
    }

    
    ?>

    <main>
        <img src="profile-pic/unknown_pic.jpg" alt="profile-pic">
        <div class="card">
            <div class="card-body">
                <h3><?php echo strtoupper($fetch_profile['NAMA']); ?></h3>
                <ol>
                    <li>
                        <p> Join in : <b> <?php echo $datetimeCO ?></b> </p> 
                    </li>
                    <li>
                        <p> Ovr Point : <b> <?php echo $sum_grade; ?> </b> </p> 
                    </li>
                </ol>
            </div>
        </div>
    </main>

    
    
    

</body>
</html>