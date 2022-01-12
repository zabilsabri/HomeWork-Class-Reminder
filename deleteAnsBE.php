<?php

session_start();
include 'connection.php';

$id = $_GET['id'];
$nama = $_SESSION['nama'];

$sql = mysqli_query($conn, "select NAME from uploaded_image where img_id = '$id'");


$row = mysqli_fetch_array($sql);

if ($row['NAME'] == $nama || $_SESSION["rules_room"] == 0){
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