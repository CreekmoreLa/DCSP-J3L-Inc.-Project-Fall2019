<?php

class user() {

  session_start();

  public function login(){
    if (isset($_SESSION['Logged in as User']) && !(empty($_SESSION['Logged in as User']))) {
      header("Location: Homepage.php");
    }

    else if (isset($_SESSION['Logged in as Admin']) && !(empty($_SESSION['Logged in as Admin']))) {
      header("Location: Homepage.php");
    }

    require_once('login.php');

    $connection = new mysqli($hn, $un, $pw, $db);

    if ($connection->connect_error) die($connection->connect_error);

    $user_name = stripslashes($_POST['user_name']);
    $password = stripslashes($_POST['password']);

    $query = "SELECT * FROM Users WHERE user_name = '$user_name'";
    $result = $connection->query($query);
    $row = $result->fetch_array();

    if (!(empty($_POST['username'])) && !(empty($_POST['password']))) {
      if (($username == $row['username']) && ($password == $row['password'])) {
      //go to check_AdminStatus
      }
      else {
        $error_msg = "You have entered something incorrectly. Please try again.";
      }
  }

  public function logout(){

  }

  public function create_account(){
  //go to make_account.php
  }

  public function check_AdminStatus(){
    if (($password == $row['password']) && ($row['type'] == 'user')) {
        $cookie_name = 'User';
        setcookie($cookie_name, $user_name);
        $_SESSION['Logged in as User'] = true;
        header("Location: Homepage.php");

    }

    else if (($password == $row['password']) && ($row['type'] == 'admin')) {
        $cookie_name = 'Admin';
        setcookie($cookie_name, $user_name);
        $_SESSION['Logged in as Admin'] = true;
        header("Location: Homepage.php");

    }
  }

  public function view_Cart(){
  // code...
  }

}

?>
