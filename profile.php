<?php

session_start();

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};


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
    <link rel="stylesheet" href="profilestyle.css">
    <title>PROFILE</title>
</head>
<body>
    <?php include 'navbar.php'; ?>   
    <a class="btn btn-dark" href="tugas.php" role="button">GO BACK<<<</a>

    <div class="heading">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a href="profile.php">
                    <h1>PROFILE</h1>
                </a>
            </div>
        </nav>
    </div>

    <?php
    
    include 'connection.php';

        $name = $_SESSION['nama'];

        $sql = mysqli_query($conn, "select * from student_info where NAMA = '$name'");
        
        $row = mysqli_fetch_array($sql);

        $createdOn = strtotime($row['updated on']);
        $datetimeCO = date("d/m/Y H:i:s", $createdOn);
    
    ?>

    <main>
        <article>
            <img src="profile-pic/unknown_pic.jpg" height=300 alt="profile-pic">
            <h4> <?php echo $_SESSION['nama'] ?> 
            <?php
                $nama = $_SESSION['nama'];
                include 'connection.php';

                $sqln = mysqli_query($conn, "select NAMA, admin_id from student_info where NAMA = '$nama'");
                $rown = mysqli_fetch_array($sqln);

                if ($rown['admin_id'] == 1){
            ?>
            <a style="color: gold; border-style: solid; border-width: 2px; padding-left: 2px; padding-right: 2px; background-color: white">Admin</a>
            <?php } ?>
            </h4>
            <h6>CREATED ON: <?php echo $datetimeCO ?></h6>
        </article>
    </main>
    

</body>
</html>