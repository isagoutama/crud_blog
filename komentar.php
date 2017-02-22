<?php

$query = ("SELECT * FROM komentar where id_artikel ='".$_GET['id']."'");
$komentar = $db->prepare($query);
$komentar->execute();
$komen = $komentar->fetchAll();
// echo print_r($komen);
?>
<?php foreach ($komen as $key): ?>
  <div class="komentar">
  <tr>
    <td><h3><?=$key[1]?></h3></td>
  </tr>
  <tr>
    <td><p><?=$key[3]?></p></td>
  </tr>
</div>
<?php endforeach; ?>
<style media="screen">
.komentar{
  background-color: rgba(84, 232, 219, 0.74);
  border: 1px solid rgb(180, 122, 39);
}
</style>
