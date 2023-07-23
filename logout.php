<?php
    // session_save_path('/home/gcheng/public_html/mmda225/login/tmp');
    session_start();
    session_destroy();
    setcookie('login_token', '', 1);
    // header("Location: ./index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Website Logout</title>
</head>
<body>
    <canvas id="background">
    </canvas>
    <main>
        <section id="section-1" >
            <h2>Logout success</h2>
            <p>If you want to see the secret message again, please login to the website again.</p>
            <a class="viewsecret" href="index.php">Login again?</a>
        </section>
    </main>
    <script src="background.js"></script>
    <script src="resize.js"></script>
</body>
</html>