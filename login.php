<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <link rel="stylesheet" href="loginstyle.css">
    <title>LOGIN</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="heading-container">
                <h1>LOG-IN</h1>
            </div>

            <?php if(isset($_GET['notlogin'])) { ?>
                <b class="failed">Anda Harus Login Terlebih Dahulu!</b>
            <?php } ?>
            
            <?php if(isset($_GET['wrong'])){ ?>
                <b class="failed">Nama atau Nis Anda Salah!</b>
            <?php } ?>
            
            <?php if(isset($_GET['empty'])){ ?>
                <b class="failed">Isi Semua!</b>
            <?php } ?>
            
            <form action="loginBE.php" method="POST">
                <div class="text-box">
                    <input type="text" class="form-content" name="username" placeholder="Nama">
                </div>
                <div class="text-box">
                    <input type="password" class="form-content" name="nis" placeholder="NIS">
                </div>
                <a href="Fpassword.php" class="forget-password">Forget Account?</a>
                <button type="submit" name="login" class="btn btn-dark">LOGIN</button>
            </form>
        </div>
    </main>
</body>

</html>