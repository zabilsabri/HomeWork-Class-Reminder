<?php
session_start();
include 'connection.php';
include 'roomSecurity.php';

    $name_room = $_SESSION['name_room'];
    $nama = $_SESSION['nama'];

    $sql = mysqli_query($conn, "select Name_Room, creator from room where Name_Room = '$name_room'");

    $row = mysqli_fetch_array($sql);

    if ($row['creator'] != $nama){
        header('location: tugas.php');
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
    <a class="btn btn-dark" href="tugas.php" role="button">GO BACK<<<</a>
    <div class="container">
        <h4>ROOM SETTING</h4>
        <form action="roomSettingChange.php" method="POST">
            <?php
                    
            $name_room = $_SESSION["name_room"];

            $sql = mysqli_query($conn, "select Name_Room, Rules_Room from room where Name_Room = '$name_room'");

            $row = mysqli_fetch_array($sql);

            if($row['Rules_Room'] == 1){

            ?>

            <div class="form-check">
                <input class="form-check-input" name="roomRules" type="checkbox" value="1" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                Only Admin Can Edit Task and Subject
                </label>
            </div>

            <?php } else {?>

            <div class="form-check">
                <input class="form-check-input" name="roomRules" type="checkbox" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">                    
                Only Admin Can Edit Task and Subject
                </label>
            </div>

            <?php } ?>
            
            <div class="containerFooter">
                <div class="button">
                    <input class="btn btn-dark" name="changeSetting" type="submit" value="Submit">
                </div>
            </div>
        </form>

    </div>
</body>

</html>