<?php

session_start();

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};


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
    <link rel="stylesheet" href="moreInfo.css">

    <title>MORE INFO</title>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <a class="btn btn-dark" href="tugas.php" role="button">GO BACK<<<</a>
            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <a href="tugas.php">
                            <h1>TASK</h1>
                        </a>

                        <?php
    
                            include 'connection.php';

                            $id = $_GET['id'];
                            $sql = mysqli_query($conn, "select * from homework where hw_id= $id");

                            $row = mysqli_fetch_array($sql);

                        ?>

                        <a class="btn btn-danger" href="hapusBE.php?id= <?= $row['hw_id'] ?> " role="button">DELETE</a>
                    </div>
                </nav>
            </div>

            <div class="infoBody">
                <div class="card mb-3" style="width: 500px;">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $row['MAPEL']; ?></h2>
                                <p class="card-text"><b class="card-bold">1. Add on: </b> <?php echo $row['DATE']; ?>
                                </p>
                                <p class="card-text"><b class="card-bold">2. Author: </b> <?php echo $row['NAMA']; ?>
                                </p>
                                <p class="card-text-deadline"><b class="card-bold">3. DeadLine: </b>
                                    <?php echo $row['DEADLINE']; ?></p>
                                <p class="card-text"><b class="card-bold">4. Info: </b>
                                    <?php echo $row['KETERANGAN']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-answer">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFileMultiple" class="form-label">Input <span><b
                                        class="input_bold">PDF</b></span> files:</label>
                            <input class="form-control" name="my_image" type="file" id="formFileMultiple" multiple>
                            <button class="btn btn-dark" type="submit" name="submit_answer">UPLOAD</button>
                        </div>
                    </form>

                    <?php include 'addAnswerBE.php' ?>

                </div>
            </div>

            <div class="answer">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">DATE</th>
                            <th scope="col">NAME</th>
                            <th scope="col">FILES</th>
                            <th scope="col">EDIT</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                
                            include 'connection.php';

                            $sql = "SELECT * FROM uploaded_image WHERE id_id = $id";
                            $res = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($res) > 0){
                                while ($images = mysqli_fetch_array($res))
                                {
            
                        ?>
                        <tr>
                            <td> <?php echo $images['DATE'] ?> </td>
                            <td> <?php echo $images['NAME'] ?> </td>
                            <td> <a href="upload/<?= $images['image_url'] ?>" download> <?php echo $images['image_url'] ?> </a> </td>
                            <td> <a class="btn btn-danger" name="deleteAns" href="deleteAnsBE.php?id= <?= $images['img_id'] ?> " role="button">DELETE</a> </td>
                        </tr>
                        <?php
                        } };
                        ?>
                    </tbody>
                </table>
            </div>

</body>

</html>