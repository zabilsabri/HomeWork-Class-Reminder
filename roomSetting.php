<?php
session_start();
include 'connection.php';
include 'roomSecurity.php';

    $id_room = $_SESSION['id_room'];
    $id_room = round($id_room);
    $id_room_passCode = (($id_room * '10052003' * '08082020')/'26091971');
    $id_room_ecrypt = urlencode(base64_encode($id_room_passCode));
    $link = $id_room_passCode.urlencode(base64_encode($id_room_passCode));

    if(!isset($_SESSION['admin'])){
        header("location: $link");
    };

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="roomSetting.css">
    <title>Room Setting</title>

</head>

<body>
    <?php include "navbarRoom.php"; ?>
    <div class="heading">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a href="tugas.php">
                        <h1>Room Setting</h1>
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalDeleteRoom">
                        Delete Room
                    </button>
                </div>
            </nav>
        </div>
    <div class="container">
        <img src="profile-pic/unknown_pic.jpg" height=250 alt="profile-pic">
        <div class="form-container">
            <form action="roomSettingChange.php" method="POST">
                <?php
                        
                $sql = mysqli_query($conn, "select * from room where id_room = '$id_room'");

                $row = mysqli_fetch_array($sql);

                ?>
                <p>1. Name Room</p>
                <input class="form-control" type="text" name="name_room" value="<?= $row['Name_Room'] ?>" aria-label="default input example">
                
                <div class="containerFooter">
                    <div class="button">
                        <input class="btn btn-dark" name="changeSetting" type="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!----------------MODAL DELETE ROOM----------------------------->
                    <div class="modal fade" id="modalDeleteRoom" tabindex="-1" aria-labelledby="modalDeleteRoom" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDeleteRoom">CONFIRM?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div style="text-align: center" class="modal-body">
                                        Are You Sure? Everything included all task, comment, grade will be delete permanently
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" href="deleteRoom.php?idR= <?= $id_room_ecrypt?> " role="button">DELETE</a>
                                    </div>
                                </div>
                            </div>
                    </div>
</body>

</html>