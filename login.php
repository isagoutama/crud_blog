<?php

session_start();
if (isset($_SESSION['user_id'])) {
  header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Login</title>
</head>
<form action="postLogin.php" method="post">
<body>
<h1 align="center" align="center">Login</h1>
<center>
  <div class="container">
  <div class="group" align="center">
  <h4 style="color:maroon" >Username</h4>
    <input type="text" name="username" required>
  </div>
  <div class="group" align="center">
    <h4 style="color:maroon">Password</h4>
    <input type="password" name="password" id="password">
    <p>
    <button type="submit" class="button buttonBlue">Login</button>
    </p>
    <p><span>Tidak Punya Akun?<a href="register.php">Daftar Sekarang</a></span></p>
      </form>
    </div>
      </div>
</center>
    <style media="screen">
    .group{
      padding: 5px;
      border-top: 5px solid #ffffff;
    }
    input{
      margin: 3px;
    }
    .container{
      width: 400px;
      height: 400px;
      border-radius: 50%;
      background-color: rgb(46, 190, 231);
      margin: auto;
    }
    </style>
  </body>
</html>
