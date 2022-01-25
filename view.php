<?php
$dbh = new PDO("mysql:host=localhost;dbname=hw_project", "root", "");
$img_id = isset($_GET['id'])? $_GET['id'] : "";
$stat = $dbh->prepare("select * from uploaded_image where img_id =?");
$stat->bindParam(1, $img_id);
$stat->execute();
$row = $stat->fetch();
header('Content-Type:'. $row['file_name']);
echo $row['file'];
?>