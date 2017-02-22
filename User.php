<?php
/**
 *
 */
class User
{
  private $db;
  private $error;
  public function __construct($db_conn)
  {
    $this->db = $db_conn;
    session_start();
  }
  public function register($email, $username, $password)
  {
    try {
      $hashPass = password_hash($password, PASSWORD_DEFAULT);
      $query = $this->db->prepare("INSERT INTO user(email,username,password) VALUES('".$email."','".$username."','".$hashPass."')");
      $query->execute();
      return true;
    } catch (PDOException $e) {
      if ($e->errorInfo[0]==23000) {
        $this->error = "Email atau Username sudah digunakan !";
        return false;
      }else {
        echo $e->getMessage();
        return false;
      }
    }

  }
  public function login($email,$password)
  {
    try {
      $query = $this->db->prepare("SELECT * FROM user WHERE email = '$email'");
      $query->execute();
      $user = $query->fetch();
      if ($query->rowCount()>0) {
        if (password_verify($password, $user['password'])) {
          $_SESSION['user_session'] = $user['id'];
          return true;
        }else {
          $this->error = "Email atau Password salah !";
          return false;
        }
      }else {
        $this->error = "Email atau Password salah !";
        return false;
      }
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }
  public function isLogedIn()
  {
    if (isset($_SESSION['user_session'])) {
      return true;
    }
  }
  public function getUser()
  {
    if (!$this->IsLogedIn()) {
      return false;
    }
    try {
      $id = $_SESSION['user_session'];
      $query = $this->db->prepare("SELECT * FROM user where id = $id");
      $query->execute();
      return $query->fetch();
    } catch (PDOException $e) {
      echo $e->getMessage();
      return false;
    }

  }
  public function logout()
  {
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }
  public function getLastError()
  {
    return $this->error;
  }

}
