<?php

require_once 'db.php';
if (($_POST['email']!="" && $_POST['username']!="" && $_POST['password']!="")) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  try {
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO user(email,username,password) VALUES('".$email."','".$username."','".$hashPass."')");
    $akun = $query->execute();
  } catch (PDOException $e) {
    if ($e->errorInfo[0]==23000) {
      echo "Email atau Username sudah digunakan !";
    }else {
      echo $e->getMessage();
    }
  }
  if (isset($akun)) {
    $_SESSION['user_id'] = $username;
    header("location: login.php");
  }
}

?>
