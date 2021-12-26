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
    <link rel="stylesheet" href="joinRoom.css">
    <title>Join Room</title>

</head>

<body>
    <?php include "navbarRoom.php"; ?>
    <a class="btn btn-dark" href="room.php" role="button">GO BACK<<<</a>

    <main>
        <div class="container">
            <div class="heading-container">
                <h1>JOIN ROOM</h1>
            </div>

            <?php if(isset($_GET['wrong'])){ ?>
                <b class="failed">Room Name or Password is Wrong!</b>
            <?php } ?>

            <form action="joinRoomBE.php" method="POST">
                    <div class="text-box">
                        <input type="text" class="form-content" name="roomName" placeholder="Room Name">
                    </div>
                    <div class="text-box">
                        <input type="password" class="form-content" name="roomPassword" placeholder="Room Password">
                    </div>

                    <button type="submit" name="joinRoom" class="btn btn-dark">JOIN</button>
            </form>
            </div>

    </main>

</body>

</html>