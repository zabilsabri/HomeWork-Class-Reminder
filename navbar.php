<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <span class="navbar-brand">GO-ABI</span>
        <small>
        <b>
            <a href="profile.php"> <?php echo $_SESSION['nama'] ?></a>
            <?php
                $nama = $_SESSION['nama'];
                include 'connection.php';

                $sqln = mysqli_query($conn, "select NAMA, admin_id from student_info where NAMA = '$nama'");
                $rown = mysqli_fetch_array($sqln);

                if ($rown['admin_id'] == 1){
            ?>
            <a style="color: gold; border-style: solid; border-width: 2px; padding-left: 2px; padding-right: 2px; background-color: white">admin</a>
            <?php } ?>
        </b>
        </small>
        <a class="btn btn-dark" href="logoutBE.php" role="button">LOGOUT</a>
    </div>
</nav>