<?php

session_start();
include 'connection.php';

$id = $_GET['id'];
$nama = $_SESSION['nama'];

$sql = mysqli_query($conn, "select NAMA from homework where hw_id = $id");

$row = mysqli_fetch_array($sql);


if ($row['NAMA'] == $nama){
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