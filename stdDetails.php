<?php

session_start();
include 'connection.php';
include "roomSecurity.php";

if(!isset($_SESSION['admin'])){
    header("location: memberRoom.php");
};

$p_id = $_GET['p_id'];

$sql_room = mysqli_query($conn, "select p_id, std_id from room_path where p_id = $p_id");
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
                <button type="button" class="btn btn-danger">Kick</button>
            </div>
        </nav>
    </div>

    <?php
    
    $std_id = $fetch_room['std_id'];
    $sql_profile = mysqli_query($conn, "select * from student_info where st_id = $std_id");
    $fetch_profile = mysqli_fetch_array($sql_profile);

    $createdOn = strtotime($fetch_profile['updated on']);
    $datetimeCO = date("d/m/Y H:i:s", $createdOn);
    
    ?>

    <main>
    <img src="profile-pic/unknown_pic.jpg" alt="profile-pic">
    <div class="card">
        <div class="card-body">
            <h3><?php echo strtoupper($fetch_profile['NAMA']); ?></h3>
        </div>
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
    </main>

    <?php
    
    $id_room = $_SESSION['id_room'];
    
    $sql_hw = mysqli_query($conn, "select * from homework where id_room = $id_room");
    
    foreach($sql_hw as $data){
        $mapel[] = $data['MAPEL'];
        $hw_id[] = $data['hw_id'];
    }
    
    ?>

    <script>
        const labels = <?php echo json_encode($mapel) ?>;
        const data = {
        labels: labels,
        datasets: [{
            label: 'My First Dataset',
            data: <?php echo json_encode($hw_id) ?>,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
            borderWidth: 1
        }]
        };

        const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
            y: {
                beginAtZero: true
            }
            }
        },
        }

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
    
    

</body>
</html>