<?php

session_start();
include 'connection.php';
include 'roomSecurity.php';

if (!isset($_SESSION['login'])){
    header('location: login.php?notlogin');
};

if(!isset($_SESSION['admin'])){
    header("location: tugas.php");
}

$id_room = $_SESSION['id_room'];
$id_room = round($id_room);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
    <link href="report.css" rel="stylesheet">
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <title>REPORT</title>
</head>

<body>
    
    <?php include 'navbar.php'; ?>

            <div class="heading">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <h1>REPORT</h1>
                    </div>
                </nav>
            </div>
            <article>
            <div class="table-responsive-xxl">
                <table class="table" id="tblExport">
                <thead>
                    <tr>
                        <th scope="col">NAME</th>
                        <?php
                        
                        $sql_hw = mysqli_query($conn, "select MAPEL from homework where id_room = $id_room");
                        while($fetch_hw = mysqli_fetch_assoc($sql_hw)){ ?>
                        <th scope="col"><?php echo $fetch_hw['MAPEL'] ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql_allStd = mysqli_query($conn, "select std_id from room_path where r_id = $id_room and status = 'member'");
                    while($fetch_allStd = mysqli_fetch_array($sql_allStd)){
                        $std_id = $fetch_allStd['std_id'];
                        $sql_stdInfo = mysqli_query($conn, "select * from student_info where st_id = $std_id");
                        $fetch_stdInfo = mysqli_fetch_array($sql_stdInfo);
                    ?>
                    <tr>
                        <th scope="row"> <?php echo $fetch_stdInfo['NAMA'] ?></th> 

                    <?php
                    
                    $sql_hw = mysqli_query($conn, "select MAPEL, hw_id from homework where id_room = $id_room");
                    while($fetch_hw = mysqli_fetch_array($sql_hw)){
                        $hw_id = $fetch_hw['hw_id'];
                        $sb_name = $fetch_hw['MAPEL'];
                        $sql_upImg = mysqli_query($conn, "select img_id from uploaded_image where id_id = $hw_id and std_id = $std_id and sb_name = '$sb_name'");
                        $fetch_upImg = mysqli_fetch_array($sql_upImg);

                        if(isset($fetch_upImg)){
                            $img_id = $fetch_upImg['img_id'];
                            $sql_grade = mysqli_query($conn, "select grade from grade_path where grd_task = $img_id");
                            $fetch_grade = mysqli_fetch_array($sql_grade); 
                            if(isset($fetch_grade)){
                    ?>

                        <td> <?php echo $fetch_grade['grade'] ?> </td>

                        <?php } else { ?>

                        <td> not graded </td>
                        
                        <?php } ?>
                    
                    <?php } else { ?>
                        
                        <td> 0 </td>
                    
                    <?php } 
                    }
                    }
                    ?>
                    </tr>

                </tbody>
                </table>
            </div>
            </article>
            <div class="buttonFooter">
                <button id="btnExport" onclick="fnExportToExcel('xlsx','(Input Your File Name)')" class="btn btn-success">Export to Excel</button>
            </div>

            <script>
                function fnExportToExcel(fileExtension,fileName){
                    var elt = document.getElementById('tblExport');
                    var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
                    return XLSX.writeFile(wb, fileName+"."+fileExtension || ('MySheetName.' + (fileExtension || 'xlsx')));
                }
            </script>
</body>

</html>