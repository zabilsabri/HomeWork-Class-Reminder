<?php

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

session_start();
include 'connection.php';
include 'roomSecurity.php';

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};

$id_allTask_ecrypt = (($_SESSION['id_room'] * '10052003' * '08082020')/'26091971');
$link = "tugas.php?id_r=".urlencode(base64_encode($id_allTask_ecrypt));


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
    <link href="allTaskStd.css" rel="stylesheet">
    <title>ALL TASK</title>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <a class="btn btn-dark" href="<?= $link; ?>" role="button">GO BACK<<<</a>
            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h1>ALL TASK</h1>
                    </div>
                </nav>
            </div>
            <article>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 1cm;">SUBJECT</th>
                            <th scope="col" style="width: 1cm;">TASK</th>
                            <th scope="col" style="width: 1cm;">FILE</th>
                            <th scope="col" style="width: 1cm;">GRADE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        include 'connection.php';

                        $id_room = $_SESSION['id_room'];
                        $std_id = $_SESSION['std_id'];
                        
                        $sql = mysqli_query($conn, "select * from homework where id_room = $id_room");
                        $num_row = mysqli_num_rows($sql);

                        if($num_row > 0){
                            while($row = mysqli_fetch_array($sql)){
                                $hw_id = $row['hw_id'];
                                
                                $time = strtotime($row['DEADLINE']);
                                $datetimeDL = date("d/m/Y H:i:s", $time);
                                date_default_timezone_set("Asia/Makassar");
                                $today_date = date("d/m/Y H:i:s");

                                $sql_file = mysqli_query($conn, "select * from uploaded_image where id_id = $hw_id");
                                $row_file = mysqli_fetch_array($sql_file);
                                $img_id = $row_file['img_id'];

                                if($img_id != null){
                                $sql_grade = mysqli_query($conn, "select * from grade_path where grd_task = $img_id");
                                };

                                $row_grade = mysqli_fetch_array($sql_grade);
                    ?>
                        <tr>
                            <td style="width: 1cm;" ><b><?php echo $row['MAPEL']; ?></b></td>


                            <?php if($row_file['file_name'] != null){ ?>
                                <td style="width: 1cm; font-size: 12px;" ><?php echo $row_file['file_name']; ?></td>
                            <?php } else { ?>
                                <td style="width: 1cm; font-size: 12px;" >-</td>
                            <?php }; ?>

                            <?php if($row_file['file'] != null){ ?>
                                <td style="width: 1cm;"><a target="_blank" href="view.php?id=<?= $row_file['img_id']; ?>"><i class="fas fa-file-download"></i></td>
                            <?php } else { ?>
                                <td style="width: 1cm;">-</td>
                            <?php }; ?>

                            
                            <?php if($row_grade['grade'] != null){ ?>
                                <td style="width: 1cm;"> <b> <?php echo $row_grade['grade']; ?>/100 </b> </td>
                            <?php } elseif($today_date > $datetimeDL) { ?>
                                <td style="width: 1cm;"> <b class="empty" > 0/100 </b> </td>
                            <?php } else { ?>
                                <td style="width: 1cm;"> <b> -/100 </b> </td>
                            <?php } ?>
                            <!----------------MODAL DELETE TASK----------------------------->
                            <div class="modal fade" id="modalDeleteSubject<?= $row['sb_id']; ?>" tabindex="-1" aria-labelledby="modalDeleteSubject<?= $row['sb_id']; ?>"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDeleteSubject<?= $row['sb_id']; ?>">CONFIRM?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div style="text-align: center" class="modal-body">
                                            Are You Sure?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="hapusSubjectBE.php?id= <?= $row['sb_id'] ?> " role="button">DELETE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                            <?php
                            }; 
                        } else { ?>
                        <tr>
                            <td></td>
                            <td><b class="empty">NO SUBJECT FOUND!</b></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php }; ?>


                    </tbody>
                </table>
            </article>
</body>

</html>