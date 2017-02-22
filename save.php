<?php
require_once 'db.php';
if ($_POST['title']!="" && $_POST['artikel']!="") {
  $title = $_POST['title'];
  $artikel = $_POST['artikel'];
  $username = $_SESSION['user_id'];
  $query = ("INSERT INTO artikel(username,title,artikel) VALUES('$username','$title','$artikel')");
  $ins = $db->prepare($query);
  $r = $ins->execute();
  if (isset($r)) {
    header("location: index.php");
  }else {
    header("location: input.php");
  }
}
else {
  header("location: input.php");
}
?>
