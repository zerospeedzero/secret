<?php
  // session_save_path('/home/gcheng/public_html/mmda225/login/tmp');
  require("auth.php");
  session_start();
  $login_message = "";  // Message shown in this HTML page for action of logging in.
  // For POST request
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["username"]) || !empty($_POST["password"])) {
      $username = strip_tags($_POST["username"]);
      $password = strip_tags($_POST["password"]);
      if (authenticating($username, $password)) {
        header("Location: ./result.php");
        exit;
      }
    }
    $login_message = "The password is wrong. Please try to login again."; 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Login</title>
  <link rel="stylesheet" href="./styles.css">
</head>
<body>
  <canvas id="background">
  </canvas>
  <main>
    <form method="POST" id="form-1" style="<?php echo is_authenticated() ? "display:none;" : "display:block;"?>">
      <fieldset>
        <h2>Login form</h2>
        <p>You need to login to this website in order to see the secret message.</p>
        <label for="username">Username</label> 
        <input type="text" name="username" id="username" required>
        <label for="password">Password</label> 
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login">
      </fieldset>
      <?php if (isset($login_message)) {echo "<p class=\"error_message\">$login_message</p>";}?>
    </form>
    <section id="section-1" style="<?php echo is_authenticated() ? "display:block;" : "display:none;"?>">
      <h2>Login success</h2>
      <?php
        $username =  $_SESSION["username"];
        echo "Hello $username" . ", ";
      ?>
      you have already logged in.
      <a class="viewsecret" href="result.php">View the secret message</a>
    </section>
  </main>
  <script src="background.js"></script>
  <script src="resize.js"></script>
</body>
</html>