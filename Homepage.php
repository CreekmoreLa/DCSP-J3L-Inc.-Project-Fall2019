<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>J3L's Shirt Shop Home Page</title>
    <link rel=”stylesheet” type=”text/css” href=”sitelook.css”/>

    <style>
        td, th {
        background-color: white;
        border: 1px solid;
        text-align: center;
        padding: 0.5em;
        }

        tbody {
        background-color: white;
        width:25%;
        text-align: center;
        }
        header{
          text-align: center;
          background-color: : #B6B6B4;
        }

    </style>

</head>

<body style ="background-color:#C24641; text-align: center;">
  <div id="homecontain">

    <div id="pgbtnhome">

      <input type="button" id="account_page" onclick="document.location.href='account.php'" value="Account Page">

      <input type="button" id="shopping_cart" onclick="document.location.href='Shopping_Cart.php'" value="Shopping Cart">


      <input type="text" id="valueToSearch" placeholder="Search an Item: ">

      <input type="submit" value = "Submit">

  </div>

    <div id="homehead">

      <br> <h1 style="background-color:#C24641; color:white; text-align:center;"> Welcome to the Homepage of J3L's Shirt Shop! </h1> <br>


    </div>

    <h2 style="background-color:#C24641; color:white; text-align: center;"> These are the shirts that we currently have in stock: </h2> <br>

    <form method="post" action="Shopping_Cart.php">

    <?php

    require_once('login.php');

      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error)
          die($conn->connect_error);

      $query = "SELECT * FROM `INVENTORY`";
      $result = $conn->query($query);

        echo '
        <table style="margin-left:auto;margin-right:auto;">
          <tr>
            <th colspan="1">ShirtID</th>
            <th colspan="1">Price</th>
            <th colspan="1">Quantity</th>
            <th colspan="1">Size</th>
            <th colspan="1">Color</th>
            <th colspan="1">Sleeve Length</th>
            <th colspan="1">Purchase?</th>
          </tr>';

        $cart = [];

        while($row = $result->fetch_array()) {

          echo '
            <tr id="'. $row[shirtID] . '" >
              <td>'. $row[shirtID] . '</td>
              <td>'. $row[price] . '</td>
              <td>'. $row[quantity] . '</td>
              <td>'. $row[size] . '</td>
              <td>'. $row[color] . '</td>
              <td>'. $row[sleeve] . '</td>
              <td> <input type="radio" name="add_to_cart" value="'. $row[shirtID] . '"> </td>
            </tr>';

        }

        echo '</table>';

        echo '<br> <input type="submit" id="submit" value="Add to Cart"> <br>';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          if (isset($_POST["add_to_cart"]) && (!empty($_POST["add_to_cart"]))) {
              $item_to_add = $_POST["add_to_cart"];
          }

        }

    ?>

    </form>

    <br><br><br> <input type="button" id="log_out" onclick="document.location.href='logout_page.php'" value="Log Out">
    <input type="button" id="log_in" onclick="document.location.href='login_page.php'" value="Log In">
  </div>

</body>

</html>
