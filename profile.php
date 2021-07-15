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
    
    ?>

    <main>
        <article>
            <div class="left-container">
                <img src="profile-pic/unknown_pic.jpg" height=300 alt="profile-pic">
                <div class="left-indicator">
                    <h5>CREATED ON:
                    
                    <br>    
                    <?php echo $row['updated on']?>
                    
                    </h5>
                </div>
            </div>
            <div class="right-container">
                <h5>NAME: <?php echo $row['NAMA'] ?></h5>
            </div>
        </article>
    </main>

</body>
</html>