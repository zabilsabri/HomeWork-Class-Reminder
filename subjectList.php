<?php

session_start();
include 'connection.php';
include 'roomSecurity.php';

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};

$id_hw_ecrypt = (($_SESSION['id_room'] * '10052003' * '08082020')/'26091971');
$link = "tugas.php?id_r=".urlencode(base64_encode($id_hw_ecrypt));


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
    <link href="styleSubjectList.css" rel="stylesheet">
    <title>SUBJECT LIST</title>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

    <a class="btn btn-dark" href="<?= $link; ?>" role="button">GO BACK<<<</a>
            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h1>SUBJECT</h1>
                        
                        <?php if(isset($_SESSION['admin'])){ ?>
                        <a type="button" href="createSubject.php" class="btn btn-dark">
                            + ADD SUBJECT
                        </a>
                        <?php }; ?>

                    </div>
                </nav>
            </div>
            <article>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NAME</th>
                            <th scope="col">SUBJECT</th>
                            <th scope="col">Edit</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        include 'connection.php';

                        $name = $_SESSION['nama'];
                        $id_room = $_SESSION['id_room'];
                        
                        $sql = mysqli_query($conn, "select sb_id, DATE, NAME, subject from subject where id_room = '$id_room'");
                        
                        $row = mysqli_num_rows($sql);

                        if($row > 0){
                            while($row = mysqli_fetch_array($sql)){
  
                    ?>
                        <tr>
                            <td><b><?php echo $row['NAME']; ?></b></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteSubject<?= $row['sb_id']; ?>">DELETE</a></td>
                            
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
                            <?php }; 
                        } else { ?>
                        <tr>
                            <td></td>
                            <td><b class="empty">NO SUBJECT FOUND!</b></td>
                            <td></td>
                        </tr>
                        <?php }; ?>


                    </tbody>
                </table>
            </article>
</body>

</html>