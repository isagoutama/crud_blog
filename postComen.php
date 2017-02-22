<?php

require_once 'db.php';
$id = $_POST['id_artikel'];
$komentar = $_POST['komentar'];
$user = $_POST['username'];
if ($id!="" && $komentar!="" && $user!="") {
  $query = ("INSERT INTO komentar(komentator,id_artikel,komentar) VALUES('$user','$id','$komentar')");
  $ins = $db->prepare($query);
  $ins->execute();
}
header("location:artikel.php?id=".$id)

?>
