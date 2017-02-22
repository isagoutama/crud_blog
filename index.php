<!DOCTYPE html>
<?php
require_once 'db.php';
$query = ("SELECT * FROM artikel");
$index = $db->prepare($query);
$index->execute();
$data = $index->fetchAll();
// echo "<pre>".print_r($data,2)."</pre>";
// echo substr($text, 0, $num_char) . '...';
?>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
    <div class="container">
    <h2>Login sebagai
    <?=$_SESSION['user_id'];?>
    </h2>
    <?php include 'header.php' ?>
    <table>
    <?php foreach ($data as $data): ?>
      <tr>
        <td>
          <p>
            <a href="artikel.php?id=<?=$data[0]?>" style="color:black;">
              <h3><?= $data[2] ?></h3>
            </a>
          </p>
        </td>
      </tr>
      <tr>
        <td><?= substr($data[3],0,100)."..." ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
  </body>
</html>
