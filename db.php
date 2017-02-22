<?php

session_start();
try {
  $db = new PDO("mysql:host=localhost;dbname=blog;","root","");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
  die("Connection Error : ". $exception->getMessage());
}

// echo "<pre>".print_r($data,1)."</pre>";
