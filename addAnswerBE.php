<?php

include 'connection.php';

if (isset($_POST['submit_answer'])){

    $id_hw_ecrypt = base64_decode(urldecode($_GET['id']));
    $id_hw = ((($id_hw_ecrypt * '26091971')/'08082020')/'10052003');
    
    $pg_id = $id_hw;
    $std_name = $_SESSION['nama'];

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0){
        if ($img_size > 2000000){
           echo " <b style='display:flex;color:red;justify-content:center'>YOUR FILE IS A BIG PP!</b> ";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lower = strtolower($img_ex);

            $allowed_ext = array('pdf');

            if (in_array($img_ex_lower, $allowed_ext)){
                $new_img_name = uniqid("PDF-", true).'.'.$img_ex_lower;
                $img_upload_path = 'upload/'. $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);


                $sql = mysqli_query($conn, "insert into uploaded_image(id_id, NAME, image_url) values ($pg_id, '$std_name','$new_img_name')");

            } else {
                echo "<b style='display:flex;color:red;justify-content:center'>PDF ONLY!</b>";
            };

        };

    } else {
        echo "<b style='display:flex;color:red;justify-content:center'>SORRY, SOMETHING IS WRONG! TRY REFRESH THE PAGE!/b>";
    };

};
