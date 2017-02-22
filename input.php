<!DOCTYPE html>
<?php session_start();

if ($_SESSION['user_id']=="") {
  header("location:login.php");
}
?>
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css.css">
  </head>
  <body>
    <div class="container">
    <?php include 'header.php' ?>
    <form action="save.php" method="post">
      <table>
        <tr>
          <td><input type="text" name="title" placeholder="Judul Artikel"></td>
        </tr>
        <tr>
          <td>
            <textarea name="artikel" placeholder="Isi Artikel"></textarea>
          </td>
        </tr>
        <tr>
          <td><button type="submit" name="button">Submit</button></td>
        </tr>
      </table>
    </form>
  </div>
  </body>
</html>
