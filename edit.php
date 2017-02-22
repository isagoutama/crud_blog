<!DOCTYPE html>
<?php

require_once 'db.php';
$query = ("SELECT * FROM artikel where id=".$_GET['id']);
$index = $koneksi->prepare($query);
$index->execute();
$data = $index->fetchAll();

 ?>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
    <?php include 'header.php' ?>
    <?php foreach ($data as $data): ?>
    <form action="save.php" method="post">
      <table>
        <input type="hidden" name="id" value="<?=$data[0]?>">
        <tr>
          <td><input type="text" name="title" placeholder="Judul Artikel" value="<?=$data[2]?>"></td>
        </tr>
        <tr>
          <td>
            <textarea name="artikel" rows="8" cols="80"><?=$data[3]?></textarea>
          </td>
        </tr>
        <tr>
          <td><button type="submit" name="button">Submit</button></td>
        </tr>
      </table>
    </form>
  <?php endforeach; ?>
  </body>
  <style media="screen">
    input,textarea,button{
      margin: 5px;
    }
  </style>
</html>
