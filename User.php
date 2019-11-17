<?php

class user() {

  session_start();

  public function login(){
    if (isset($_SESSION['Logged in as User']) && !(empty($_SESSION['Logged in as User']))) {
      header("Location: user_page.php");
    }

    else if (isset($_SESSION['Logged in as Admin']) && !(empty($_SESSION['Logged in as Admin']))) {
      header("Location: admin_page.php");
    }

    include_once(login.php)
    
    $connection = new mysqli($hn, $un, $pw, $db);

    if ($connection->connect_error) die($connection->connect_error);

    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);

    $query = "SELECT * FROM lab4_users WHERE username = '$username'";
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
            $full_name = $row['forename'] .= " ";
            $full_name = $full_name .= $row['surname'];
            $cookie_name = 'User';
            setcookie($cookie_name, $full_name);
            $_SESSION['Logged in as User'] = true;
            header("Location: user_page.php");
    }

    else if (($password == $row['password']) && ($row['type'] == 'admin')) {
            $full_name = $row['forename'] .= " ";
            $full_name = $full_name .= $row['surname'];
            $cookie_name = 'Admin';
            setcookie($cookie_name, $full_name);
            $_SESSION['Logged in as Admin'] = true;
            header("Location: admin_page.php");
    }
  }

  public function view_Cart(){
  // code...
  }

}

?>
