<?php

session_start();
include 'connection.php';

$id = $_GET['id'];
$nama = $_SESSION['nama'];

$sql = mysqli_query($conn, "select NAME from uploaded_image where img_id = $id");
$sql2 = mysqli_query($conn, "select admin_id from student_info where NAMA = '$nama'");


$row = mysqli_fetch_array($sql);
$rowc = mysqli_fetch_array($sql2);

if ($row['NAME'] == $nama || $rowc['admin_id'] == 1){
    $sqli = mysqli_query($conn, "delete from uploaded_image where img_id = $id");
    echo "
    
    <script>
    javascript:history.go(-1)
    </script>

    ";
} else {
    
    echo "
    <script>
        alert('ANDA BUKAN PEMILIK TUGAS!')
        document.location.href = 'tugas.php'
    </script>
    
    ";
};

?>