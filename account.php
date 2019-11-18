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

      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error)
          die($conn->connect_error);

      // TODO: pull from cookie or session...
      $user_name = "" ;

      $query = "SELECT email, user_name, cc_num, mail_address, reward_points FROM USERS WHERE user_name = '$user_name'";
      $result = $conn->query($query);

      while($row = $result->fetch_array()) {

        if ($_SESSION['Logged in as User'] = true)
        {
            echo 'Welcome to your Account Page User, ' . $row[user_name] . "!";
            echo 'Rewards Points: ' . $row[reward_points];
            echo 'Mailing Address: ' . $row[mail_address];
            echo 'Credit Card info: ' . $row[cc_num];
        }

        else if ($_SESSION['Logged in as Admin'] = true)
        {
            echo 'Welcome to your Account Page Admin, ' . $row[user_name] . "!";
            echo 'Rewards Points: ' . $row[reward_points];
            echo 'Mailing Address: ' . $row[mail_address];
            echo 'Credit Card info: ' . $row[cc_num];
        }

      }

  ?>

</body>


</html>
