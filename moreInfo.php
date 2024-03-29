<?php

session_start();
include 'connection.php';
include 'roomSecurity.php';

$roomId = $_SESSION['id_room'];

$id_hw_ecrypt = base64_decode(urldecode($_GET['id']));
$id_hw_r = ((($id_hw_ecrypt * '26091971')/'08082020')/'10052003');
$id_hw = round($id_hw_r);

$roomId = round($roomId);

$sql_dl_check = mysqli_query($conn, "select * from homework where id_room = '$roomId' and hw_id = $id_hw");

$id_moreInfo_ecrypt = (($roomId * '10052003' * '08082020')/'26091971');
$link = "tugas.php?id_r=".urlencode(base64_encode($id_moreInfo_ecrypt));

while($row_dl_check = mysqli_fetch_array($sql_dl_check)){
    $time = strtotime($row_dl_check['DEADLINE']);
    $datetimeDL = date("d/m/Y H:i:s", $time);

    date_default_timezone_set("Asia/Makassar");
    $today_date = date("d/m/Y H:i:s");

    if($today_date > $datetimeDL){
        header('location: '.$link);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="moreInfo.css">

    <title>MORE INFO</title>
</head>

<body>

    <?php include 'navbar.php'; ?>
            <div class="big-container">
                <div class="heading">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <a href="tugas.php">
                                <h1>TASK DETAILS</h1>
                            </a>

                            <?php
        
                                include 'connection.php';
                                $ses_name = $_SESSION['nama'];
                                $id = $id_hw;
                                $sql = mysqli_query($conn, "select * from homework where hw_id= '$id'");

                                $rowtest = mysqli_fetch_array($sql);

                                $time = strtotime($rowtest['TANGGAL']);
                                $datetimeHW = date("d/m/Y H:i:s", $time);

                                $timeDL = strtotime($rowtest['DEADLINE']);
                                $dateDL = date("d/m/Y H:i:s", $timeDL);

                            ?>
                            <?php if(isset($_SESSION['admin'])){ ?>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modalDeleteTask">
                                DELETE
                            </button>
                            <?php } else {
                                $sql_task_id = "select * from uploaded_image where id_id = $id and NAME = '$ses_name' ";
                                $num_task_id = mysqli_query($conn, $sql_task_id);

                                while($row_task_id = mysqli_fetch_array($num_task_id)){
                                    $task_id = $row_task_id['img_id'];
                                    $sql_grade_task_std = "select * from grade_path where grd_task = $task_id";
                                    $num_grade_id = mysqli_query($conn, $sql_grade_task_std);
                                    if(mysqli_num_rows($num_grade_id) > 0){
                                        while($row_grade_std = mysqli_fetch_array($num_grade_id)){
                            ?>

                            <b> <?php echo $row_grade_std['grade']; ?> / 100 </b>

                            <?php }

                            } else { ?>

                            <b> 0 / 100 </b>

                            <?php }
                                }; 
                            };
                            ?>

                        </div>
                    </nav>
                </div>
                <main>
                    <div class="infoBody">
                        <div class="container">
                            <h2 class="container-title"><?php echo $rowtest['MAPEL']; ?></h2>
                            <p class="container-text"><b class="container-bold">1. Add on: </b> <?php echo $datetimeHW; ?>
                            </p>
                            <p class="container-text"><b class="container-bold">2. Author: </b>
                                <?php echo $rowtest['NAMA']; ?>
                            </p>
                            <p class="container-text-deadline"><b class="container-bold">3. DeadLine:
                                </b><?php echo $dateDL; ?></p>
                            <p class="container-text"><b class="container-bold">4. Description:
                                </b><?php echo $rowtest['KETERANGAN']; ?></p>
                        </div>
                        <div class="input-answer">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Input <span><b
                                                class="input_bold">PDF</b></span> files:</label>
                                    <input class="form-control" name="my_file" type="file" id="formFileMultiple" multiple>
                                    <button class="btn btn-dark" type="submit" name="submit_answer">UPLOAD ANSWER</button>
                                </div>
                            </form>

                            <?php include 'addAnswerBE.php' ?>

                        </div>
                    </div>
                </main>

                <div class="answer">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">DATE</th>
                                <th scope="col">NAME</th>
                                <th scope="col">FILES</th>
                                <th scope="col">DELETE</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    
                                include 'connection.php';
                                
                                $sql_check_task = "select * from uploaded_image where id_id = $id and NAME = '$ses_name' ";
                                $res = mysqli_query($conn, $sql_check_task);

                                $sql_show_task = mysqli_query($conn, "select * from uploaded_image where id_id = $id and NAME = '$ses_name'");

                                $row_check = mysqli_fetch_array($res);
                                $row = mysqli_num_rows($res);

                                if($row > 0){
                                    while ($files = mysqli_fetch_array($sql_show_task)){
                                        $filesTime = strtotime($files['DATE']);
                                        $filesTimeFX = date("d/m/Y H:i:s", $filesTime);
                            ?>
                            <tr>
                                <td> <?php echo $filesTimeFX ?> </td>
                                <td> <?php echo $files['NAME'] ?> </td>
                                <td> <a target="_blank" href="view.php?id=<?= $files['img_id']; ?>"><i class="fas fa-file-download"></i></td>
                                <td> <a type="button" class="btn btn-danger" href="deleteAnsBE.php?id= <?= $files['img_id'] ?> " data-bs-toggle="modal" data-bs-target="#modalDeleteAns"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                            <!----------------MODAL DELETE ANSWER----------------------------->
                            <div class="modal fade" id="modalDeleteAns" tabindex="-1" aria-labelledby="modalDeleteAns"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDeleteAns">CONFIRM?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div style="text-align: center" class="modal-body">
                                            Are You Sure?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="deleteAnsBE.php?id= <?= $files['img_id'] ?> "
                                                role="button">DELETE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            };
                            } else {
                            ?>
                            <tr>
                                <td><b style="color: red;">EMPTY!</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                            };
                            ?>
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="input-comment-section">
                    <div class="mb-3">
                        <label for="student-name-comment" class="form-label">NAME:</label>
                        <input type="email" class="form-control" id="student-name-comment"
                            placeholder=" <?php echo $_SESSION['nama'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <form method="POST">
                            <label for="student-comment" class="form-label">COMMENT:</label>
                            <textarea class="form-control" name="comment" id="student-comment" rows="3"></textarea>
                            <button class="btn btn-dark" type="submit" name="submit_comment">POST</button>
                        </form>
                    </div>
                </div>

                <hr>

                <?php include 'addCommentBE.php'; ?>


                <?php
                
                $sqlco = "SELECT * FROM comment_section where task_id = $id";
                $sen = mysqli_query($conn, $sqlco);
                $count = mysqli_num_rows($sen);
                
                ?>

                <p class="comment-indicator"> Comments: <?php echo $count ?> </p>

                <?php
                if ($count > 0){
                    while ($wor = mysqli_fetch_array($sen)){
                        $timeC = strtotime($wor['DATE']);
                        $datetimeC = date("d/m/Y H:i:s", $timeC);
                ?>

                <div class="comment-section">
                    <div class="comment-container">
                        <div class="comment-profile-pic">
                            <img src="profile-pic/unknown_pic.jpg" width=64 alt="">
                        </div>
                        <div class="comment-body">
                            <div class="comment-name">
                                <b><?php echo $wor['NAME'] ?> <span> <small> <?php echo $datetimeC; ?> </small> </span></b>
                            </div>
                            <div class="comment">
                                <p> <?php echo $wor['comment']; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php };
                } else {
                ?>

                <h5 class="comment-indicator">NO COMMENTS YET!</h5>

                <?php }; ?>

            </div>


            <!----------------MODAL DELETE TASK----------------------------->
            <div class="modal fade" id="modalDeleteTask" tabindex="-1" aria-labelledby="modalDeleteTask"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteTask">CONFIRM?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="text-align: center" class="modal-body">
                            Are You Sure?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" href="hapusBE.php?id= <?= $rowtest['hw_id'] ?> " role="button">DELETE</a>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>