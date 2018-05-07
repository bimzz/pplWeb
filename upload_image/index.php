<?php
 
session_start();
 
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
 
    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
 
      // Cek user login
      // Edit dibagian ini jika user Anda berasal dari database
 
      if ($username == 'admin' && $password == 'admin'):
        $_SESSION['username'] = $username;
        
        ?>
        Login sukses...
        <script>
        window.location = 'home.php';
        </script>
      <?php else: ?>
        Login gagal, <a href="index.php">coba lagi</a>
      <?php endif;
    }
    else {
    ?>
	<center><table border="0">
      <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
	<tr>
	<td>Username</td>
        <td><input type="text" name="username" value="" placeholder="Username"></td>
	</tr>
	<tr>
        <td>Password</td><td><input type="password" name="password" value="" placeholder="Password"></td>
	</tr>
	<tr>
        <td colspan="2"><center><button type="submit">Login</button></center></td>
	</tr>
      </form>
	</table></center>
    <?php } ?>
  </body>
</html>
