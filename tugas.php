<?php

session_start();
include 'connection.php';
include "roomSecurity.php";

$id_room_ecrypt = base64_decode(urldecode($_GET['id_r']));
$id_room = ((($id_room_ecrypt * '26091971')/'08082020')/'10052003');
$_SESSION['id_room'] = $id_room;

$std_id = $_SESSION['std_id'];

$sql_main = mysqli_query($conn, "select * from room where id_room = '$id_room'");
$row_main = mysqli_fetch_array($sql_main);
$_SESSION['name_room'] = $row_main['Name_Room'];

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
    <link rel="stylesheet" href="style.css">
    <title>TUGAS</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="heading">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="tugas.php"><h1><?php echo $row_main['Name_Room']; ?></h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCP"
                    aria-controls="navbarCP" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCP">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" data-bs-toggle="modal" data-bs-target="#addtaskmodal" href="#">+ ADD TASK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="subjectList.php">SUBJECT LIST</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="memberRoom.php">ROOM MEMBER</a>
                        </li>

                        <?php include "connection.php"; 

                        if ($row_main['creator'] === $_SESSION['nama']){ 
                            $_SESSION['admin'] = 1;
                            ?>
                            <li>
                                <a class="nav-link active" href="roomSetting.php">ROOM SETTING</a>
                            </li>
                        <?php } ?>

                    </ul>
                    <form class="search-task" method="GET" action="tugas.php">
                        <input class="form-control-bar" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <article>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">SUBJECT</th>
                    <th scope="col">DEADLINE</th>
                    <th scope="col">INFO</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                        include 'connection.php';

                        if (isset($_GET['search'])){
                            $sql = mysqli_query($conn, "select * from homework where concat(TANGGAL, NAMA, MAPEL, DEADLINE) like '%" .$_GET['search']. "%' and id_room = '$id_room'");
                        } else {
                            $sql = mysqli_query($conn, "select * from homework where id_room = '$id_room'");
                        };
                        
                        $row = mysqli_num_rows($sql);

                        if ($row > 0){
                            while($row = mysqli_fetch_array($sql)){ 
                                $id_hw_pass = $row['hw_id'];
                                $id_hw_ecrypt = (($id_hw_pass * '10052003' * '08082020')/'26091971');

                                $link = "moreInfo.php?id=".urlencode(base64_encode($id_hw_ecrypt));
                                $link_admin = "adminCMS.php?id=".urlencode(base64_encode($id_hw_ecrypt));
                            ?>
                    <tr>
                        <td>                
                            <a href="moreInfo.php?id= <?= $row['hw_id'] ?> ">
                                <?php echo $row['MAPEL']; ?> 
                            </a>
                            <?php
                            $time = strtotime($row['DEADLINE']);
                            $datetimeDL = date("d/m/Y H:i:s", $time);
                            ?>
                        </td>
                        <td><b class="deadline"><?php echo $datetimeDL; ?></b></td>

                        <?php if(isset($_SESSION['admin'])) {?>
                            <td><a class="btn btn-dark" href="<?= $link_admin; ?>" role="button">DETAILS</a></td>
                        <?php } else { ?>
                            <td><a class="btn btn-dark" href="<?= $link; ?>" role="button">DETAILS</a></td>
                        <?php }; ?>
                    </tr>
                        <?php }; 
                        } else {
                        ?>
                    <tr>
                        <td></td>
                        <td><b class="empty">NO TASK FOUND!</b></td>
                        <td></td>
                    </tr>
                        <?php }; ?>


            </tbody>
        </table>
    </article>
    <!------------MODAL CREATE TASK------------------------->
    <div class="modal fade" id="addtaskmodal" tabindex="-1" aria-labelledby="HomeworkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="HomeworkModalLabel">ADD HOMEWORK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="createBE.php" method="POST">
                        1. SUBJECT


                        <select class="form-select" name="mapel" aria-label="Default select example">

                            <?php

                            include 'connection.php';
                            
                            $sqlc = mysqli_query($conn, "select * from subject where id_room = '$id_room'");

                            while($rows = mysqli_fetch_array($sqlc)){

                        ?>

                            <option> <?php echo $rows['subject'] ?> </option>

                            <?php }; ?>
                        </select>
                        2. DEADLINE
                        <input class="form-control" type="datetime-local" name="deadline" aria-label="default input example">
                        <div class="mb-3">
                            <label for="textareaket" class="form-label">3. DESCRIPTION</label>
                            <textarea class="form-control" name="keterangan" id="textareaket" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!------------MODAL CREATE SUBJECT------------------------->
    <div class="modal fade" id="addsubjectmodal" tabindex="-1" aria-labelledby="HomeworkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="HomeworkModalLabel">ADD SUBJECT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="createSubjectBE.php" method="POST">
                        1. SUBJECT
                        <input class="form-control" name="subject" type="text" aria-label="default input example">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="createSubject" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>