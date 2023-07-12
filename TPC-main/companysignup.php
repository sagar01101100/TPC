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

      <form action="signupcheckcompany.php" method="post">
        <div class="input-container">
          <label for="companyname">Companyname:</label>
          <input type="text" id="username" name="companyname" required>
        </div>
        
        <div class="input-container">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        </div>
        <div class="input-container">
          <label for="confirm-password">Confirm Password:</label>
          <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <div class="button-container">
          <button type="submit" class="signup-button">Sign Up</button>
          <a href="index.php"><button type="button" class="login-button">Already have an account?</button></a>
        </div>
      </form>
    </div>
  </body>
</html>