<?php

require_once 'db.php';
$query = ("DELETE FROM artikel where id=".$_GET['id']);
$index = $db->prepare($query);
$index->execute();
header("location:index.php");

?>
