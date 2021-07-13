<?php


include 'connection.php';

if (isset($_POST['submit_answer'])){

    $pg_id = $_GET['id'];

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0){
        if ($img_size > 125000){
           echo "BIG PP!";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lower = strtolower($img_ex);

            $allowed_ext = array('jpg', 'jpeg', 'png', 'pdf');

            if (in_array($img_ex_lower, $allowed_ext)){
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lower;
                $img_upload_path = 'upload/'. $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);


                $sql = mysqli_query($conn, "insert into uploaded_image(id_id, image_url) values ($pg_id ,'$new_img_name')");

            } else {
                echo "WTF";
            };

        };

    } else {
        echo "something wrong I can feel it!";
    };

};
