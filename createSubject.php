<?php

session_start();
include 'connection.php';
include 'roomSecurity.php';


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
    <link href="styleSubject.css" rel="stylesheet">
    <title>CREATE SUBJECT</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="conatiner-heading">
                <h2 class="container-heading">ADD SUBJECT</h2>
            </div>

            <div class="container-indicator">
                <?php if(isset($_GET['empty'])) { ?>
                    <b class="failed">Fill the Input!</b>
                <?php } ?>
                <p>Add all of your subject by pressing "ADD" button. If done, press the "NEXT" button.</p>
            </div>
            <div class="container-body">
                <form action="createSubjectBE.php" method="POST">
                    1. Subject Name:
                    <input class="form-control" name="subject" type="text" aria-label="default input example">
                    <div class="container-button">
                        <button type="submit" name="addSubject" class="btn btn-secondary">ADD</button>
                        <a class="btn btn-secondary" href="subjectList.php" role="button">NEXT>>></a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>