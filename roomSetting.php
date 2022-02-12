<?php
session_start();
include 'connection.php';
include 'roomSecurity.php';

    $id_room = $_SESSION['id_room'];

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
    <link rel="stylesheet" href="roomSetting.css">
    <title>Room Setting</title>

</head>

<body>
    <?php include "navbarRoom.php"; ?>    
    <div class="container">
        <h4>ROOM SETTING</h4>
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
</body>

</html>