<?php

session_start();
include 'connection.php';

$id = $_GET['id'];
$nama = $_SESSION['nama'];

$sql = mysqli_query($conn, "select NAMA from homework where hw_id = $id");
$sql2 = mysqli_query($conn, "select admin_id from student_info where NAMA = '$nama'");


$row = mysqli_fetch_array($sql);
$rowc = mysqli_fetch_array($sql2);

if ($row['NAMA'] == $nama || $rowc['admin_id'] == 1){
    $sqli = mysqli_query($conn, "delete from homework where hw_id = $id");
    header('location: tugas.php');

} else {
    
    echo "
    <script>
        alert('ANDA BUKAN PEMILIK TUGAS!')
        document.location.href = 'tugas.php'
    </script>
    
    ";
};

?>