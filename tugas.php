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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <title>TUGAS</title>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand">GO-ABI</span>
            <small>
                <b><?php echo $_SESSION['nama'] ?></b>
            </small>
            <a class="btn btn-dark" href="logoutBE.php" role="button">SIGN OUT</a>
        </div>
    </nav>
    <div class="heading">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <h1>TUGAS</h1>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addmodal">
                    + ADD
                </button>
                <select class="something" aria-label="Default select example">
                    <option selected>All</option>
                    <option value="AGAMA">AGAMA</option>
                    <option value="PKN">PKN</option>
                    <option value="B. INDO">B. INDO</option>
                    <option value="MATEMATIKA (M)">Matematika (M)</option>
                    <option value="Matematika (W)">Matematika (W)</option>
                    <option value="SEJARAH">SEJARAH</option>
                    <option value="B. INGGRIS (M)">B. INGGRIS (M)</option>
                    <option value="B. INGGRIS (W)">B. INGGRIS (W)</option>
                    <option value="SENI BUDAYA">SENI BUDAYA</option>
                    <option value="PJOK">PJOK</option>
                    <option value="PRAKARYA">PRAKARYA</option>
                    <option value="FISIKA">FISIKA</option>
                    <option value="BIOLOGI">BIOLOGI</option>
                    <option value="KIMIA">KIMIA</option>
                    <option value="GEOGRAFI">GEOGRAFI</option>
                    <option value="EKONOMI3">EKONOMI</option>
                    <option value="SOSIOLOGI">SOSIOLOGI</option>
                    <option value="TIK">TIK</option>
                    <option value="B. ASING">B. ASING</option>
                </select>
            </div>
        </nav>
    </div>
    <article>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">MAPEL</th>
                    <th scope="col">DEADLINE</th>
                    <th scope="col">KET.</th>
                    <th scope="col">EDIT</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                        
                        include 'connection.php';
                        
                        $sql = mysqli_query($conn, "select * from homework");

                        while($row = mysqli_fetch_assoc($sql)){
                    
                    ?>
                <tr>
                    <td><?php echo $row['DATE']; ?></td>
                    <td><b><?php echo $row['NAMA']; ?></b></td>
                    <td><?php echo $row['MAPEL']; ?></td>
                    <td><b class="deadline"><?php echo $row['DEADLINE']; ?></b></td>
                    <td><?php echo $row['KETERANGAN']; ?></td>
                    <td><a class="btn btn-dark" href="hapusBE.php?id= <?= $row['hw_id'] ?> "role="button">DELETE</a>
                    </td>
                
                <?php }; ?>

                </tr>


            </tbody>
        </table>
    </article>
    <!------------MODAL CREATE------------------------->
    <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="HomeworkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="HomeworkModalLabel">ADD HOMEWORK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="createBE.php" method="POST">
                        1. MAPEL
                        <select class="form-select" name="mapel" aria-label="Default select example">
                            <option value="AGAMA">AGAMA</option>
                            <option value="PKN">PKN</option>
                            <option value="B. INDO">B. INDO</option>
                            <option value="MATEMATIKA (M)">Matematika (M)</option>
                            <option value="Matematika (W)">Matematika (W)</option>
                            <option value="SEJARAH">SEJARAH</option>
                            <option value="B. INGGRIS (M)">B. INGGRIS (M)</option>
                            <option value="B. INGGRIS (W)">B. INGGRIS (W)</option>
                            <option value="SENI BUDAYA">SENI BUDAYA</option>
                            <option value="PJOK">PJOK</option>
                            <option value="PRAKARYA">PRAKARYA</option>
                            <option value="FISIKA">FISIKA</option>
                            <option value="BIOLOGI">BIOLOGI</option>
                            <option value="KIMIA">KIMIA</option>
                            <option value="GEOGRAFI">GEOGRAFI</option>
                            <option value="EKONOMI3">EKONOMI</option>
                            <option value="SOSIOLOGI">SOSIOLOGI</option>
                            <option value="TIK">TIK</option>
                            <option value="B. ASING">B. ASING</option>
                        </select>
                        2. DEADLINE
                        <input class="form-control" type="text" name="deadline" aria-label="default input example">
                        <div class="mb-3">
                            <label for="textareaket" class="form-label">3. KETERANGAN</label>
                            <textarea class="form-control" name="keterangan" id="textareaket" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create" class="btn btn-primary">CREATE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>