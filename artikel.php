<!DOCTYPE html>
<?php

require_once 'db.php';
$query = ("SELECT * FROM artikel where id=".$_GET['id']);
$index = $db->prepare($query);
$index->execute();
$data = $index->fetch(PDO::FETCH_OBJ);


 ?>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?= $data->title ?></title>
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
    <div class="container">
    <?php include 'header.php' ?>
    <table>
      <tr>
        <td>
          <h1><?= $data->title ?></h1>
        </td>
      </tr>
      <tr>
        <td> <p><?= $data->artikel ?></p></td>
      </tr>
      <tr>
        <td><hr></td>
      </tr>
      <tr>
        <td style="float:right;margin-right:10px;color:#328fd2;"><h3>@<?= $data->username ?></h3></td>
      </tr>
      <tr>
        <td>
          <?php if (isset($_SESSION['user_id'])): ?>
            <form action="postComen.php" method="post">
              <input type="hidden" name="username" value="<?=$_SESSION['user_id']?>">
              <input type="hidden" name="id_artikel" value="<?=$_GET['id']?>">
              <tr>
                <td><input type="text" name="komentar" placeholder="Masukkan komentar anda tentang artikel ini"></td>
              </tr>
              <tr>
                <td><button type="submit">komentar</button></td>
              </tr>
            </form>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td><?php include 'komentar.php'; ?></td>
      </tr>
    </div>
    </body>
    </table>
</html>
