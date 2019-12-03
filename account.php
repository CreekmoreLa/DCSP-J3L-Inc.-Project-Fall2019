<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang = "en">

<head>

    <title> Account Page </title>

</head>

<body style="background-color:#C24641; color:white;">

  <input type="button" id="home_page" onclick="document.location.href='Homepage.php'" value="Back to Homepage">

  <input type="button" id="shopping_cart" onclick="document.location.href='Shopping_Cart.php'" value="Shopping Cart">

  <br> <h1> Welcome to the Account Page of J3L's Shirt Shop! </h1> <br>

  <?php

      require_once('login.php');

      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error)
          die($conn->connect_error);

      if(isset($_COOKIE["User"])) {
        $email = $_COOKIE['User'];
      }
      else if(isset($_COOKIE["Admin"])) {
        $email = $_COOKIE['Admin'];
      }

      $query = "SELECT email, user_name, cc_num, mail_address, reward_points FROM USERS WHERE email = '$email'";
      $result = $conn->query($query);

      if (!isset($_COOKIE['User']) && !isset($_COOKIE['Admin'])) {

        echo 'It looks like you are not currently logged in! Please Log in to view your account information.<br>'; ?>

        <br><input type="button" id="log_in" onclick="document.location.href='login_page.php'" value="Log In"><br> <?php
      }

      else {
        while($row = $result->fetch_array()) {

          if ($_SESSION['Logged in as User'] = true)
          {
            echo '<h3>Welcome to your Account Page, ' . $row[user_name] . '!</h3><br>';
            echo '<h3>Rewards Points: ' . $row[reward_points] .'</h3><br>';
            echo '<h3>Mailing Address: ' . $row[mail_address] .'</h3><br>';
            echo '<h3>Credit Card info: ' . $row[cc_num] .'<h3><br>';
          }

          else if ($_SESSION['Logged in as Admin'] = true)
          {
            echo '<h3>Welcome to your Account Page, ' . $row[user_name] . '!</h3><br>';
            echo '<h3>Rewards Points: ' . $row[reward_points] .'</h3><br>';
            echo '<h3>Mailing Address: ' . $row[mail_address] .'</h3><br>';
            echo '<h3>Credit Card info: ' . $row[cc_num] .'<h3><br>';
          }
        }
      }
  ?>

</body>


</html>
