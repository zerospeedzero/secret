<?php
  // session_save_path('/home/gcheng/public_html/mmda225/login/tmp');
  require("auth.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website result</title>
  <link rel="stylesheet" href="./styles.css">
</head>
<body>
  <canvas id="background">
  </canvas>
  <main>
    <section style="<?php echo is_authenticated() ? "display:none;" : "display:block;" ?>">
      <h2>Sorry</h2>
      <p class="secret_message">You are not authorized to see the secret message. Please login to the website in order to see the secret message.</p>
      <a class="viewsecret" href="index.php">Login</a>
    </section>
    <section id="secret" style="<?php echo is_authenticated() ? "display:block;" : "display:none;" ?>">
      <h2>The secret message</h2>
      <p class="secret_message"><?php echo is_authenticated() ?  "AIOps stands for \"Artificial Intelligence for IT Operations\"." : "" ?></p>
      <a class="viewsecret" href="logout.php">Logout</a>
    </section>
  </main>
  <script src="background.js"></script>
  <script src="resize.js"></script>
</body>
</html>