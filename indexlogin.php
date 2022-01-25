<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css"
        href="style.css">
  </head>
  <body>
    <form action="login.php" method="post">
      <h2>LOGIN</h2>
      <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?>
      </p>
      <?php } ?>
      <lable>User ID</lable>
      <input type ="text" name="UserID" placeholder="User ID"><br>
      <lable>Password</lable>
      <input type ="password" name="password" placeholder="password"><br>
      <button type ="submit">Login</button>
    </form>
  </body>
</html>
