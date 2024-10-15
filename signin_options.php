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
  <title>Sign Up Options - Carpooling Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="index.php" class="back-button">&#8592;</a>
  <div class="container-shadow"></div>
  <div class="container">
    <div class="wrap">
      <div class="headings">
        <a id="driver-option" href="#" class="active" onclick="showDriverForm()"><span>Driver</span></a>
        <a id="rider-option" href="#" onclick="showRiderForm()"><span>Rider</span></a>
      </div>
      <div id="driver-form">
        <p class="description">Offer rides, earn money by driving to destinations.</p>
        <form action="signup_driver.php" method="post">
          <label for="driver-license">Driver's License Number</label>
          <input id="driver-license" type="text" name="license" required />
          <input type="submit" class="button" name="signup" value="Sign Up As Driver" />
        </form>
      </div>
      <div id="rider-form" style="display: none;">
        <p class="description">Find convenient and affordable rides to your desired locations.</p>
        <form action="login.php" method="post"></form>
          <input type="submit" class="button" name="login" value="Sign Up As Rider" />
        </form>
      </div>
      <footer>
        <div class="hr"></div>
      </footer>
    </div>
  </div>
  <script>
    function showDriverForm() {
      document.getElementById('driver-form').style.display = 'block';
      document.getElementById('rider-form').style.display = 'none';
      document.getElementById('driver-option').classList.add('active');
      document.getElementById('rider-option').classList.remove('active');
    }

    function showRiderForm() {
      document.getElementById('driver-form').style.display = 'none';
      document.getElementById('rider-form').style.display = 'block';
      document.getElementById('driver-option').classList.remove('active');
      document.getElementById('rider-option').classList.add('active');
    }
  </script>
</body>
</html>