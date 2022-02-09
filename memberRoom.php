<?php

session_start();
include 'connection.php';

include 'roomSecurity.php';

$id_roomMember_ecrypt = (($_SESSION['id_room'] * '10052003' * '08082020')/'26091971');
$link = "tugas.php?id_r=".urlencode(base64_encode($id_roomMember_ecrypt));
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

    <link href="memberRoom.css" rel="stylesheet">
    <title>ROOM MEMBERS</title>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <a class="btn btn-dark" href="<?= $link; ?>" role="button">GO BACK<<<</a>
            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h1>ROOM MEMBER</h1>
                        <?php if(!isset($_SESSION['admin'])){ ?>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteMemberstd">Leave</button>
                        <?php }; ?>
                    </div>
                </nav>
            </div>
            <article>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <?php if(isset($_SESSION['admin'])){ ?>
                            <th scope="col">Kick</th>
                            <?php }; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        include 'connection.php';

                        $id_room = $_SESSION['id_room'];
                        
                        $sql = mysqli_query($conn, "select * from room_path where r_id = '$id_room'");
                        
                        while($row_path = mysqli_fetch_array($sql)){
                            $id_std = $row_path['p_id'];
                            $id_std_ecrypt = (($id_std * '10052003' * '08082020')/'26091971');
                            $link_kick = "kickMemberBE.php?id=".urlencode(base64_encode($id_std_ecrypt));
                            
                            $std_id = $row_path['std_id'];
                            $sql_room = mysqli_query($conn, "select NAMA, st_id from student_info where st_id = '$std_id'");
                            
                            while($row = mysqli_fetch_array($sql_room)){
  
                    ?>
                        <tr>
                            <td style="width: 1cm;" ><b><?php echo $row['NAMA']; ?></b></td>
                            <td style="width: 1cm;"> <?php echo $row_path['status']; ?> </td>
                            <?php if(isset($_SESSION['admin'])){ ?>
                            <td style="width: 1cm;"><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteMember<?= $row_path['p_id']; ?>"><i class="fas fa-user-slash"></i></a></td>
                            <!----------------MODAL DELETE TASK ADMIN----------------------------->
                            <div class="modal fade" id="modalDeleteMember<?= $row_path['p_id']; ?>" tabindex="-1" aria-labelledby="modalDeleteMember<?= $row_path['p_id']; ?>"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDeleteMember<?= $row_path['p_id']; ?>">CONFIRM?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div style="text-align: center" class="modal-body">
                                            Are You Sure?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="<?= $link_kick ?>" role="button">Kick</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </tr>
                            <?php }; 
                            
                            };?>

                    </tbody>
                </table>
            </article>
            <!----------------MODAL DELETE TASK----------------------------->
                    <?php
                    $ses_std_id = $_SESSION['std_id'];
                    $sql_std = mysqli_query($conn, "select p_id, std_id, r_id from room_path where std_id = '$ses_std_id' and r_id = '$id_room'");
                    $row_std = mysqli_fetch_array($sql_std);
                    
                    $p_id_std = $row_std['p_id'];

                    $id_std_ecrypt_std = (($p_id_std * '10052003' * '08082020')/'26091971');
                    $link_kick_std = "kickMemberBE.php?id=".urlencode(base64_encode($id_std_ecrypt_std));
                    ?>
                            <div class="modal fade" id="modalDeleteMemberstd" tabindex="-1" aria-labelledby="modalDeleteMemberstd"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDeleteMemberstd">CONFIRM?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div style="text-align: center" class="modal-body">
                                            Are You Sure?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="<?= $link_kick_std ?>" role="button">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
</body>

</html>