<!DOCTYPE html>
<?php

require_once 'db.php';
$query = ("SELECT * FROM artikel where username ='".$_GET['user']."'");
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
    <p>
    <?php include 'header.php'; ?>
    </p>
    <table>
      <tr>
        <th>No</th>
        <th>Judul Artikel</th>
        <th colspan="2">Pilihan</th>
      </tr>
      <?php for($i=0;$i<sizeof($data);$i++): ?>
        <tr>
          <td><?=$i+1?></td>
          <td><?=$data[$i][2]?></td>
          <td><a href="edit.php?id=<?=$data[$i][0]?>">Edit</a></td>
          <td><a onclick="return confirm('yakin mau hapus <?= $data[$i][2]; ?>') ?" href="delete.php?id=<?=$data[$i][0]?>">Delete</a></td>
          <td><a href="artikel.php?id=<?=$data[$i][0]?>">Readmore...</a></td>
        </tr>
      <?php endfor; ?>
    </table>
  </div>
  </body>
</html>
