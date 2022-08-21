<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <link rel="stylesheet" href="signUpstyle.css">
    <script src="https://kit.fontawesome.com/645f3ace4e.js" crossorigin="anonymous"></script>
    <title>Sign Up</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="heading-container">
                <h1>SIGN-UP</h1>
            </div>
            
            <form action="signUpBE.php" method="POST">
                <div class="text-box">
                    <input type="text" class="form-content" name="username" placeholder="Nama" required>
                </div>
                <div class="text-box">
                    <input type="password" id="password" class="form-content" name="nis" placeholder="Password" required>
                    <div class="eye">
                        <i class="fas fa-eye-slash" onclick="showHide()" id="toogle"></i>
                    </div>
                </div>
                <button type="submit" name="register" class="btn btn-dark">SIGN UP</button>
            </form>
            <div class="footer-container">
                <small>Already Have an Account? <a href="login.php">Sign In Here!</a></small>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="script.js"></script>
</body>

</html>