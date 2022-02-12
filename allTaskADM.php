<?php

session_start();
include 'connection.php';
include 'roomSecurity.php';

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};

if(!isset($_SESSION['admin'])){
    header("location: allTaskStd.php");
}


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
    <script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
    <link href="allTaskADM.css" rel="stylesheet">
    <title>ALL TASK ADMIN</title>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h1>ALL TASK</h1>
                    </div>
                </nav>
            </div>
            <article>
            <?php
                $id_room = $_SESSION['id_room'];
                $sql = mysqli_query($conn, "select * from homework where id_room = $id_room");
                $num_row = mysqli_num_rows($sql);
                    
                if($num_row > 0){
                    while($row = mysqli_fetch_array($sql)){
                        $time = strtotime($row['DEADLINE']);
                        $datetimeDL = date("d/m/Y H:i:s", $time);

                        $t_id_crypt = (($row['hw_id'] * '10052003' * '08082020')/'26091971');
                        $t_link = "adminCMS.php?id=".urlencode(base64_encode($t_id_crypt));

            ?>
            <div class="card">
                <div class="card-body">
                    <h4><?php echo $row['MAPEL']; ?></h4>
                    <b class="empty" ><?php echo $datetimeDL; ?></b>
                    <?php

                    $id_room = $_SESSION['id_room'];
                    $id = $row['hw_id'];

                    $sql_hw_room = mysqli_query($conn, "SELECT * FROM uploaded_image WHERE id_id = $id");
                    $sql_std_room = mysqli_query($conn, "select std_id, r_id, status from room_path where r_id = '$id_room' and status = 'member'");
                    
                    $hw_check = mysqli_num_rows($sql_hw_room);
                    $std_check = mysqli_num_rows($sql_std_room);
                    
                    
                    ?>
                    <div class="container-answer">
                        <a href="<?= $t_link ?>">
                            <div class="row">
                                <div class="col" style="border-right: black solid">
                                    <h4><?php echo $hw_check; ?></h4>
                                    <p>Finished Task</p>
                                </div>
                                <div class="col" style="border-left: black solid">
                                    <h4><?php echo $std_check - $hw_check; ?></h4>
                                    <p>Un-Finished Task</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php } 
            } ?>
            </article>
</body>

</html>