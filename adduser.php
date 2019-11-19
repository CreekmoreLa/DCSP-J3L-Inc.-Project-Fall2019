<?php

session_start;

$email = "";
$user_name = "";
$password = "";
$cc_num = "";
$mail_address = "";
$reward_points = "0";
$empty = "0";
$exists = "0";

$connection = new mysqli($hn, $un, $pw, $db);

if (isset($_POST['crte_acc'])){

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cc_num = mysqli_real_escape_string($db, $_POST['cc_num']);
  $mail_address = mysqli_real_escape_string($db, $_POST['mail_address']);


  if ($email == ""){
    $empty = "1";
  }
  if ($user_name == ""){
    $empty = "1";
  }
  if ($password == ""){
    $empty = "1";
  }
  if ($cc_num == ""){
    $empty = "1";
  }
  if ($mail_address == ""){
    $empty = "1";
  }

  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);

  if ($user['email'] === $email) {
    $exists = "1";
  }

  if ($empty == "0" && $exists == "0"){
    $query = "INSERT INTO users (email, user_name, password, cc_num, mail_address, reward_points) VALUES
              ($email, $user_name, $password, $cc_num, $mail_address, $reward_points)";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "Login Success";
    header('location: Homepage.php');
  }
}
 ?>
