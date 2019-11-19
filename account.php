<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang = "en">

<head>

    <title> Account Page </title>

</head>

<body>

  <input type="button" id="shopping_cart" onclick="document.location.href='Shopping_Cart.php'" value="Shopping Cart">

  <input type="button" id="home_page" onclick="document.location.href='Homepage.php'" value="Back to Homepage">


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

      while($row = $result->fetch_array()) {

        if ($_SESSION['Logged in as User'] = true)
        {
          echo 'Welcome to your Account Page, user ' . $row[user_name] . '!<br>';
          echo 'Rewards Points: ' . $row[reward_points] .'<br>';
          echo 'Mailing Address: ' . $row[mail_address] .'<br>';
          echo 'Credit Card info: ' . $row[cc_num] .'<br>';
        }

        else if ($_SESSION['Logged in as Admin'] = true)
        {
          echo 'Welcome to your Account Page, admin ' . $row[user_name] . '!<br>';
          echo 'Rewards Points: ' . $row[reward_points] .'<br>';
          echo 'Mailing Address: ' . $row[mail_address] .'<br>';
          echo 'Credit Card info: ' . $row[cc_num] .'<br>';
        }


          //echo 'It looks like you are not currently logged in! Please Log in to view your account information.';

          //<br><input type="button" id="log_out" onclick="document.location.href='logout_page.php'" value="Log Out"><br>



      }

  ?>

</body>


</html>
