<?php

session_start();
include 'connection.php';

$id = $_GET['id'];
$nama = $_SESSION['nama'];

$sql = mysqli_query($conn, "select NAME from subject where sb_id = $id");

$row = mysqli_fetch_array($sql);


if ($row['NAME'] == $nama){
    $sqli = mysqli_query($conn, "delete from subject where sb_id = $id");
    header('location: subjectList.php');

} else {
    
    echo "
    <script>
        alert('ANDA BUKAN PEMILIK!')
        document.location.href = 'subjectList.php'
    </script>
    
    ";
};

?>