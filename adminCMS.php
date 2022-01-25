<?php

session_start();
include 'connection.php';
include 'roomSecurity.php';

$id_hw_ecrypt = base64_decode(urldecode($_GET['id']));
$id_hw = ((($id_hw_ecrypt * '26091971')/'08082020')/'10052003');

$id_moreInfo_ecrypt = (($_SESSION['id_room'] * '10052003' * '08082020')/'26091971');
$link = "tugas.php?id_r=".urlencode(base64_encode($id_moreInfo_ecrypt));

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
    <link rel="stylesheet" href="adminCMS.css">

    <title>MORE INFO</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <a class="btn btn-dark" href="<?= $link; ?>" role="button">GO BACK<<<</a>
        <div class="big-container" style="width: 88%; margin-left: auto; margin-right: auto;">
            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <a href="tugas.php">
                            <h1>TASK DETAILS</h1>
                        </a>

                        <?php
    
                            include 'connection.php';

                            $id = $id_hw;
                            $roomId = $_SESSION['id_room'];
                            $sql = mysqli_query($conn, "select * from homework where hw_id= '$id'");

                            $rowtest = mysqli_fetch_array($sql);

                            $time = strtotime($rowtest['TANGGAL']);
                            $datetimeHW = date("d/m/Y H:i:s", $time);

                            $timeDL = strtotime($rowtest['DEADLINE']);
                            $dateDL = date("d/m/Y H:i:s", $timeDL);

                        ?>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDeleteTask">
                            DELETE
                        </button>
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
                </div>
            </main>

            <div class="answer">
                <div class="answer-title">
                    <h2>Statistic</h2>
                </div>
                <?php
                    
                    include 'connection.php';

                    $id_room = $_SESSION['id_room'];

                    $sql_hw_room = mysqli_query($conn, "SELECT * FROM uploaded_image WHERE id_id = $id");
                    $sql_std_room = mysqli_query($conn, "select std_id, r_id, status from room_path where r_id = '$id_room' and status = 'member'");
                    
                    $hw_check = mysqli_num_rows($sql_hw_room);
                    $std_check = mysqli_num_rows($sql_std_room);
                    
                ?>

                <div class="container-answer">
                    <a href="stdTask.php?t_id= <?= $_GET['id']; ?>">
                        <div class="row">
                            <div class="col" style="border-right: black solid">
                                <h2><?php echo $hw_check; ?></h2>
                                <p>Task Done</p>
                            </div>
                            <div class="col" style="border-left: black solid">
                                <h2><?php echo $std_check - $hw_check; ?></h2>
                                <p>Task Undone</p>
                            </div>
                        </div>
                    </a>
                </div>
                
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