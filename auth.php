<?php
  // Return true if the user has already been authenticated by either session or cookie. Otherwise, return false.
  function is_authenticated() {
    if (isset($_SESSION["username"])) {
      return true;
    } else {
      if (isset($_COOKIE['login_token'])) {
        $username = substr($_COOKIE['login_token'], 0, strpos($_COOKIE['login_token'], ':'));
        $hashed_password = substr($_COOKIE['login_token'], strpos($_COOKIE['login_token'], ':' ) + 1);
        // For two users : "agent" and "hello"
        if ( ( password_verify('password123', $hashed_password)) && (strtolower($username) == "agent" || strtolower($username) == "hello" ) ) {
          $_SESSION["username"] = $username;
          return true;
        }
      }
    }
    return false;
  }

  // Return true if login is success. Otherwise, return false.
  function authenticating($username, $password) {
    // For two users : "agent" and "hello"
    if (((strtolower($username) == "agent" || strtolower($username) == "hello" ) && $password == "password123" )) {  
      setcookie('login_token', $username . ':' . password_hash($password, PASSWORD_ARGON2I, ['memory_cost' => 1024, 'time_cost' => 5, 'threads' => 4]), time()+ 60 * 60 * 25);
      $_SESSION["username"] = $username;
      return true;
    }
    return false;
  }
?>