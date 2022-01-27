<?php

session_start();
include 'connection.php';
include 'roomSecurity.php';

$id_stdTask_ecrypt = base64_decode(urldecode($_GET['t_id']));
$id_stdTask = ((($id_stdTask_ecrypt * '26091971')/'08082020')/'10052003');

if(!isset($_SESSION['admin'])){
    header("location: $link");
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
    <link href="stdTask.css" rel="stylesheet">
    <title>STUDENT TASK</title>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <a class="btn btn-dark" href="adminCMS.php?id=<?= $_GET['t_id']; ?>" role="button">GO BACK<<<</a>
            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h1>STUDENT TASK</h1>
                    </div>
                </nav>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#un-grade" type="button" role="tab" aria-controls="home" aria-selected="true">Un-Grade</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#grade" type="button" role="tab" aria-controls="profile" aria-selected="false">Grade</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#late-task" type="button" role="tab" aria-controls="contact" aria-selected="false">Late-Task</button>
                </li>
            </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="un-grade" role="tabpanel" aria-labelledby="home-tab">
                        <article>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Time</th>
                                        <th scopr="col">Task</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    $name = $_SESSION['nama'];
                                    $id_room = $_SESSION['id_room'];
                                    
                                    $sql = mysqli_query($conn, "select * from uploaded_image where id_id = '$id_room'");
                                    
                                    $row = mysqli_num_rows($sql);

                                    if($row > 0){
                                        while($rowg = mysqli_fetch_array($sql)){
                                            $taskTime = strtotime($rowg['DATE']);
                                            $taskTimeFX = date("d/m/Y H:i:s", $taskTime);
            
                                ?>
                                    <tr>
                                        <td style="width: 1cm;" ><b><?php echo $rowg['NAME']; ?></b></td>
                                        <td style="width: 1cm;" ><?php echo $taskTimeFX; ?></td>
                                        <td style="width: 1cm;" ><a target="_blank" href="view.php?id=<?= $rowg['img_id']; ?>"><i class="fas fa-file-download"></i></td>
                                        <td style="width: 1cm;">
                                            <div class="grade">
                                                <form action="saveStdTask.php" method="POST">
                                                <input class="form-control form-control-sm" style="width: 1.1cm;" name="grade<?=$rowg['img_id'];?>" type="text" aria-label=".form-control-sm example">
                                                </form>
                                                <p>/100</p>
                                            </div>
                                        </td>
                                        <td style="width: 1cm;" ><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAddNote<?= $rowg['img_id']; ?>"><i class="fas fa-comment"></i></a></td>
                                        
                                    </tr>
                                        <?php }; 
                                    ?> 

                                    <?php
                                    } else { ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><b class="empty">NO TASK FOUND!</b></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php }; ?>

                                </tbody>
                            </table>
                        </article>
                        <div class="test" style="display: flex;"><button type="submit" name="saveStdTask" class="btn btn-dark"><i class="far fa-save"></i></button></div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="grade" role="tabpanel" aria-labelledby="profile-tab">
                        
                    </div>
                    <div class="tab-pane fade" id="late-task" role="tabpanel" aria-labelledby="contact-tab">
                    
                    </div>
                </div>
</body>

</html>