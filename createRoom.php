<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <link rel="stylesheet" href="createRoom.css">
    <title>Create Room</title>
</head>

<body>
    <?php include "navbarRoom.php"; ?>
    <a class="btn btn-dark" href="room.php" role="button">GO BACK<<<</a>

    <main>
        <div class="container">
            <div class="heading-container">
                <h1>CREATE ROOM</h1>
            </div>
            
            <?php if(isset($_GET['exist'])){ ?>
                <b class="failed">Room is Already Exist!</b>
            <?php } ?>

            <?php if(isset($_GET['empty'])){ ?>
                <b class="failed">Fill All The Fields!</b>
            <?php } ?>

            <form action="createRoomBE.php" method="POST">
                    <div class="text-box">
                        <input type="text" class="form-content" name="roomName" placeholder="Name">
                    </div>
                    <div class="text-box">
                        <input type="password" class="form-content" name="roomPassword" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Only Admin Can Change The Room Settings
                        </label>
                    </div>

                    <button type="submit" name="createRoom" class="btn btn-dark">CREATE</button>
            </form>
            </div>

    </main>

</body>

</html>