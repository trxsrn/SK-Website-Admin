<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KISLAP ADMIN</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="login">
        <div class="img">
            <img src="assets/img/sk_logo.png" opacity="0.5">
        </div>
        <div class="form">
            <h1>e-KISLAP</h1>
            <form action="assets/login_verify.php" method="post">
                <h4>ADMIN LOGIN</h4>
                <br><br>
                <label>Username</label>
                <input type="text" name="username"/>
                <label>Password</label>
                <input type="password" name="password"/>
                <input type="submit" value="LOGIN"/>
            </form>
        </div>
    </div>
</body>
</html>