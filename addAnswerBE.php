<?php

$dbh = new PDO("mysql:host=localhost;dbname=hw_project", "root", "");

if (isset($_POST['submit_answer'])){

    $id_hw_ecrypt = base64_decode(urldecode($_GET['id']));
    $id_hw = ((($id_hw_ecrypt * '26091971')/'08082020')/'10052003');
    
    $std_id = $_SESSION['std_id'];
    $pg_id = $id_hw;
    $std_name = $_SESSION['nama'];
    $sb_name = $rowtest['MAPEL'];
    $id_room = $_SESSION['id_room'];

    $file_name = $_FILES['my_file']['name'];
    $file_type = $_FILES['my_file']['type'];
    $file_size = $_FILES['my_file']['size'];
    $tmp_name = file_get_contents($_FILES['my_file']['tmp_name']);
    $error = $_FILES['my_file']['error'];

    if ($error === 0){
        if ($file_size > 2000000){
           echo " <b style='display:flex;color:red;justify-content:center'>YOUR FILE IS A BIG PP!</b> ";
        } else {
            $stmt = $dbh->prepare("insert into uploaded_image(id_id, id_room, sb_name, NAME, std_id, file_name, file) values(?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $pg_id);
            $stmt->bindParam(2, $id_room);
            $stmt->bindParam(3, $sb_name);
            $stmt->bindParam(4, $std_name);
            $stmt->bindParam(5, $std_id);
            $stmt->bindParam(6, $file_name);
            $stmt->bindParam(7, $tmp_name);
            $stmt->execute();
        };

    } else {
        echo "<b style='display:flex;color:red;justify-content:center'>SORRY, SOMETHING IS WRONG! TRY REFRESH THE PAGE!/b>";
    };

};
