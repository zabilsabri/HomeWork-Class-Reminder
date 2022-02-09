<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

session_start();
include 'connection.php';
include 'roomSecurity.php';

$id_room = $_SESSION['id_room'];

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
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#un-grade" type="button" role="tab" aria-controls="home" aria-selected="true">Finished Task</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#grade" type="button" role="tab" aria-controls="profile" aria-selected="false">Grade</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#undone_task" type="button" role="tab" aria-controls="contact" aria-selected="false">Un-finished Task</button>
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
                                    
                                    $sql_file1 = mysqli_query($conn, "select * from uploaded_image where id_id = $id_stdTask");
                                    while($row_file1 = mysqli_fetch_array($sql_file1)){
                                        $img_id = $row_file1['img_id'];

                                        $sql_grade1 = mysqli_query($conn, "select * from grade_path where grd_task = $img_id");
                                        $row_grade1 = mysqli_fetch_array($sql_grade1);            
                                        if($img_id != $row_grade1['grd_task']){
                                ?>
                                    <tr>
                                        <td style="width: 1cm;" ><b><?php echo $row_file1['NAME']; ?></b></td>
                                        <td style="width: 1cm;" ><?php echo $row_file1['DATE']; ?></td>
                                        <td style="width: 1cm;" ><a target="_blank" href="view.php?id=<?= $row_file1['img_id']; ?>"><i class="fas fa-file-download"></i></td>
                                        <td style="width: 1cm;">
                                            <form action="saveStdTask.php?t_id=<?= $id_stdTask ?>" method="POST">
                                            <div class="grade">
                                                <input class="form-control form-control-sm" style="width: 1.1cm;" name="grade<?=$row_file1['img_id'];?>" type="text" aria-label=".form-control-sm example">
                                                <p>/100</p>
                                            </div>
                                        </td>
                                        <td style="width: 1cm;" ><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalAddNote<?= $rowg['img_id']; ?>"><i class="fas fa-comment"></i></a></td>
                                        
                                    </tr>
                                        <?php }
                                    }
                                    ?>
                                       
                                </tbody>
                            </table>
                        </article>
                        <div class="test" style="display: flex; justify-content: flex-end; margin-right: 1cm; "><button type="submit" name="saveStdTask" class="btn btn-dark" style="width: 2cm;" ><i class="far fa-save"></i></button></div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="grade" role="tabpanel" aria-labelledby="profile-tab">
                        <article>
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 1cm;" >Name</th>
                                        <th scope="col" style="width: 1cm;" >Time Grade</th>
                                        <th scopr="col" style="width: 1cm;" >Task</th>
                                        <th scope="col" style="width: 1cm;" >Grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                    $sql_file2 = mysqli_query($conn, "select * from uploaded_image where id_id = $id_stdTask");
                                    while($row_file2 = mysqli_fetch_array($sql_file2)){
                                        $img_id2 = $row_file2['img_id'];

                                        $sql_grade2 = mysqli_query($conn, "select * from grade_path where grd_task = $img_id2");
                                        $row_grade2 = mysqli_fetch_array($sql_grade2);            
                                        if($img_id2 == $row_grade2['grd_task']){                                    
                                    ?>
                                    <tr>
                                        <td style="width: 1cm;" ><b><?php echo $row_file2['NAME']; ?></b></td>
                                        <td style="width: 1cm;" ><?php echo $row_grade2['grd_time']; ?></td>
                                        <td style="width: 1cm;" ><a target="_blank" href="view.php?id=<?= $row_file2['img_id']; ?>"><i class="fas fa-file-download"></i></td>
                                        <td style="width: 1cm;" ><b><?php echo $row_grade2['grade']; ?></b></td>
                                    </tr>
                                    <?php };
                                    } 
                                    ?>
                                    
                                </tbody>
                            </table>
                        </article>
                    </div>
                    <div class="tab-pane fade" id="undone_task" role="tabpanel" aria-labelledby="contact-tab">
                        <?php
                        
                        $sql_std_id = mysqli_query($conn, "select * from room_path where r_id = $id_room and status = 'member'");
                        while($row_std_id = mysqli_fetch_array($sql_std_id)){
                            $std_id = $row_std_id['std_id'];

                            $sql_task_check = mysqli_query($conn, "select * from uploaded_image where std_id = $std_id and id_id = $id_stdTask");
                            $row_task_check = mysqli_fetch_array($sql_task_check);

                            if($row_task_check['std_id'] != $std_id){ 
                                $sql_std_info = mysqli_query($conn, "select st_id, NAMA from student_info where st_id = $std_id");
                                $row_std_info = mysqli_fetch_array($sql_std_info);                               
                        ?>
                        <div class="card-body-undone">
                            <div class="card-body">
                                <p id="mycopy" ><?php echo $row_std_info['NAMA']; ?></p>
                                <b class="empty">Unfinished!</b>
                            </div>
                        </div>
                        <?php };
                        }
                        ?>
                    </div>
                </div>
</body>

</html>