<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Signup Form with Back Button</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="index.php" class="back-button">&#8592;</a>
  <div class="container-shadow"></div>
  <div class="container">
    <div class="wrap">
      <div class="headings">
        <a id="sign-in" href="#" class="active" onclick="showSignIn()"><span>Log In</span></a>
        <a id="sign-up" href="#" onclick="showSignUp()"><span>Sign Up</span></a>
      </div>
      <div id="sign-in-form">
        <form action="login.php" method="post">
          <label for="email">Email</label>
          <input id="email" type="text" name="email" required />
          <label for="password">Password</label>
          <input id="password" type="password" name="password" required />
          <input type="submit" class="button" name="login" value="Sign in" />
        </form>
        <footer>
          <div class="hr"></div>
        </footer>
      </div>
      <div id="sign-up-form" style="display: none;">
        <form action="signin_options.php" method="post">
          <label for="name">Name</label>
          <input id="name" type="text" name="name" required />
          <label for="username-signup">Username</label>
          <input id="username-signup" type="text" name="username" required />
          <label for="password-signup">Password</label>
          <input id="password-signup" type="password" name="password" required />
          <input type="submit" class="button" name="signup" value="Create Account" />
        </form>
    </div>
    </div>
  </div>
  <script>
    function showSignIn() {
      document.getElementById('sign-in-form').style.display = 'block';
      document.getElementById('sign-up-form').style.display = 'none';
      document.getElementById('sign-in').classList.add('active');
      document.getElementById('sign-up').classList.remove('active');
    }

    function showSignUp() {
      document.getElementById('sign-in-form').style.display = 'none';
      document.getElementById('sign-up-form').style.display = 'block';
      document.getElementById('sign-in').classList.remove('active');
      document.getElementById('sign-up').classList.add('active');
    }
  </script>
</body>
</html>
