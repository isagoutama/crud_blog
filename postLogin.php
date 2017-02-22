<?php
require_once 'db.php';
try {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM user WHERE username = '$username'";
  $query = $db->prepare($sql);
  $query->execute();
  $user = $query->fetch();
  echo "<pre>".print_r($user,2)."</pre>";
  if ($query->rowCount()>0) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['username'];
      header("location:index.php");
    }else {
      $error = "Email atau Password salah !";
      header("location:login.php");
    }
  }else {
    $error = "Email atau Password salah !";
    header("location:login.php");
  }
} catch (Exception $e) {
  echo $e->getMessage();
  return false;
}

?>
