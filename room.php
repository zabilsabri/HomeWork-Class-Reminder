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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="room.css">
    <title>Room</title>
</head>

<body>
    <?php include "navbarRoom.php"; ?>
    
    <div class="dropright">
        <div class="btn-group dropend">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-plus"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="createRoom.php">Create Room</a></li>
                <li><a class="dropdown-item" href="joinRoom.php">Join Room</a></li>
            </ul>
        </div>
    </div>

    <main>
        <div class="row">
            <?php  
            $std_id = $_SESSION['std_id'];
            
            $sql = mysqli_query($conn, "select * from room_path where std_id = '$std_id'");
            
            while($row = mysqli_fetch_array($sql)){
                $id_rooms = $row['r_id'];

                $sqls = mysqli_query($conn, "select * from room where id_room = '$id_rooms'");

                while($rows = mysqli_fetch_array($sqls)){
                    $id_room_pass = $rows['id_room'];
                    $id_room_ecrypt = (($id_room_pass * '10052003' * '08082020')/'26091971');
                    $link = "tugas.php?id_r=".urlencode(base64_encode($id_room_ecrypt));
                    
                    if($rows['creator'] == $_SESSION['nama']){?>
                        <div class="card border-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">
                                <h3> <?php echo $rows['Name_Room']; ?> </h3>
                                <div class="roomImg">
                                    <img src="profile-pic/unknown_pic.jpg" width="50px" height="50px" alt="gambar">
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text"> Creator: <?php echo $rows['creator']; ?> </p>
                                <p class="card-text"> Status: Admin </p>
                                <a href="<?= $link; ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    <?php } else { ?>
                    <div class="card border-info mb-3" style="max-width: 18rem;">
                        <div class="card-header"> 
                            <h3> <?php echo $rows['Name_Room']; ?> </h3>
                            <div class="roomImg">
                                <img src="profile-pic/unknown_pic.jpg" width="50px" height="50px" alt="gambar">
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text"> Creator: <?php echo $rows['creator'] ?> </p>
                            <p class="card-text"> Status: Member </p>
                            <a href="<?= $link; ?>" class="stretched-link"></a>
                        </div>
                    </div>

            <?php };
                };
            };
            ?>
        </div>
    </main>

</body>

</html>