<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="stylesignup.css">
  </head>
  <body>
  
    <div class="container">
    
      <h2>Sign Up</h2>

      <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <?php if(isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>

      <form action="signup-check.php" method="post">
        <div class="input-container">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="input-container">
          <label for="rollno">Roll Number:</label>
          <input type="text" id="rollno" name="rollno" required>
        </div>
        <div class="input-container">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="input-container">
          <label for="confirm-password">Confirm Password:</label>
          <input type="password" id="confirm-password" name="confirm_password" required>
        </div>
        <div class="button-container">
          <button type="submit" class="signup-button">Sign Up</button>
          <a href="index.php"><button type="button" class="login-button">Already have an account?</button></a>
        </div>
      </form>
    </div>
  </body>
</html>

