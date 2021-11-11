<?php

session_start();
include 'connection.php';

$id = $_GET['id'];
$nama = $_SESSION['nama'];

$sql = mysqli_query($conn, "select NAME from subject where sb_id = $id");
$sql2 = mysqli_query($conn, "select admin_id from student_info where NAMA = '$nama'");

$row = mysqli_fetch_array($sql);
$rowc = mysqli_fetch_array($sql2);


if ($row['NAME'] == $nama || $rowc['admin_id'] == 1){
    $sqli = mysqli_query($conn, "delete from subject where sb_id = $id");
    header('location: subjectList.php');

} 
else {
    
    echo "
    <script>
        alert('ANDA BUKAN PEMILIK!')
        document.location.href = 'subjectList.php'
    </script>
    
    ";
};

?>