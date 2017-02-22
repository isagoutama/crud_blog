<div class="menu">
    <ul>
      <li><a href="index.php">Home</a></li>
      <?php if ($_SESSION['user_id']): ?>
        <li><a href="data_saya.php?user=<?=$_SESSION['user_id'];?>">Artikel Saya</a></li>
        <li><a href="input.php">Tambah Artikel</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php elseif ($_SESSION['user_id']==""): ?>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <?php endif; ?>
    </ul>
</div>
