<?php
require_once('login.php');
function filterTable($query)
{
  $connect = mysqli_connect("localhost", $email, $password, "USERS");
  if ($conn->connect_error)
      die($conn->connect_error);
}

 ?>





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
      session_start();

      require_once('login.php');
      $connect = mysqli_connect("localhost", $email, $password, "USERS");
      if ($conn->connect_error){
        die($conn->connect_error);
      }




      // TODO: pull from cookie or session...
      $cookie_name = "user";
      $cookie_value = email;
      setcookie($cookie_name, $cookie_value, time() + (86400 *30), "/");

      $query = "SELECT email, user_name, cc_num, mail_address FROM USERS WHERE email = '$email'";
      $result = $conn->query($query);

      while($row = $result->fetch_array()) {

        if ($_SESSION['Logged in as User'] = true)
        {
            echo 'Welcome to your Account Page User, ' . $row[user_name] . "!";
            echo 'Reward Points: ' . $row[reward_points];
            echo 'Email: ' . $row[email];
            echo 'Mailing Address: ' . $row[mail_address];
            echo 'Credit Card info: ' . $row[cc_num];
        }

        else if ($_SESSION['Logged in as Admin'] = true)
        {
            echo 'Welcome to your Account Page Admin, ' . $row[user_name] . "!";
            echo 'Email: ' . $row[email];
            echo 'Mailing Address: ' . $row[mail_address];
            echo 'Credit Card info: ' . $row[cc_num];
        }
        else
        {
          echo "You need to log in!";
        }

      }

  ?>

</body>


</html>
