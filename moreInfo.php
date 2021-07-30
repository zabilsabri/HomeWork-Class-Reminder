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
                            <h1>TASK DETAILS</h1>
                        </a>

                        <?php
    
                            include 'connection.php';

                            $id = $_GET['id'];
                            $sql = mysqli_query($conn, "select * from homework where hw_id= $id");

                            $row = mysqli_fetch_array($sql);

                            $time = strtotime($row['TANGGAL']);
                            $datetimeHW = date("d/m/Y H:i:s", $time);


                        ?>

                        <a class="btn btn-danger" href="hapusBE.php?id= <?= $row['hw_id'] ?> " role="button">DELETE</a>
                    </div>
                </nav>
            </div>
            <main>
                <div class="infoBody">
                    <div class="container">
                        <h2 class="container-title"><?php echo $row['MAPEL']; ?></h2>
                        <p class="container-text"><b class="container-bold">1. Add on: </b> <?php echo $datetimeHW; ?>
                        </p>
                        <p class="container-text"><b class="container-bold">2. Author: </b> <?php echo $row['NAMA']; ?>
                        </p>
                        <p class="container-text-deadline"><b class="container-bold">3. DeadLine:
                            </b><?php echo $row['DEADLINE']; ?></p>
                        <p class="container-text"><b class="container-bold">4. Description:
                            </b><?php echo $row['KETERANGAN']; ?></p>
                    </div>
                    <div class="input-answer">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Input <span><b
                                            class="input_bold">PDF</b></span> files:</label>
                                <input class="form-control" name="my_image" type="file" id="formFileMultiple" multiple>
                                <button class="btn btn-dark" type="submit" name="submit_answer">UPLOAD ANSWER</button>
                            </div>
                        </form>

                        <?php include 'addAnswerBE.php' ?>

                    </div>
                </div>
            </main>

            <div class="answer">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">DATE</th>
                            <th scope="col">NAME</th>
                            <th scope="col">FILES</th>
                            <th scope="col">DELETE</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                
                            include 'connection.php';

                            $sql = "SELECT * FROM uploaded_image WHERE id_id = $id";
                            $res = mysqli_query($conn, $sql);
                            $row = mysqli_num_rows($res);

                            if($row > 0){
                                while ($files = mysqli_fetch_array($res))
                                {
            
                        ?>
                        <tr>
                            <td> <?php echo $files['DATE'] ?> </td>
                            <td> <?php echo $files['NAME'] ?> </td>
                            <td> <a style="color: blue;" href="upload/<?= $files['image_url'] ?>" download>PDF FILE</td>
                            <td> <a class="btn btn-danger" name="deleteAns"
                                    href="deleteAnsBE.php?id= <?= $files['img_id'] ?> " role="button">-</a> </td>
                        </tr>
                        <?php
                        }; 
                        } else {
                        ?>
                        <tr>
                            <td><b style="color: red;">EMPTY!</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                        };
                        ?>
                    </tbody>
                </table>
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
            
            <p class="comment-indicator" > Comments: <?php echo $count ?> </p>

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

</body>

</html>