<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Shopping Cart</title>

    <style>
        td, th {
        border: 1px solid;
        text-align: center;
        padding: 0.5em;
        }

        tbody {
        width:25%
        }
    </style>

</head>

<body style="background-color:#C24641; color:white;">

  <div id="shcrtbtns">
    <input type="button" id="home_page" onclick="document.location.href='Homepage.php'" value="Back to Homepage">
    <input type="button" id="account_page" onclick="document.location.href='account.php'" value="Account Page"> <br>
  </div>

  <div id="shopcarttitle">
    <br> <h1 style="background-color:#C24641; color:white;">J3L's Shirt Shop Shopping Cart View</h1> <br>
  </div>

  <form method="post" action="Shopping_Cart.php">

<?php

  require_once('login.php');

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error)
      die($conn->connect_error);

  $item_to_add = $_POST["add_to_cart"];

  if (!isset($_SESSION["Cart"]) && $item_to_add != null) {
    $_SESSION["Cart"] = array($item_to_add);
  }

  else if (isset($_SESSION["Cart"]) && $item_to_add != null) {
    array_push($_SESSION["Cart"], $item_to_add);
  }

  else if (!$_SESSION['Logged in as User'] || !$_SESSION['Logged in as Admin']) {
    echo "You must login before you can add items to your cart!";
  }

  else if (!isset($_POST["add_to_cart"]) && (empty($_POST["add_to_cart"]))) {
    echo "You must add to cart first!";
  }

    echo '
    <table>
      <tr>
        <th colspan="1">ShirtID</th>
        <th colspan="1">Price</th>
        <th colspan="1">Quantity</th>
        <th colspan="1">Size</th>
        <th colspan="1">Color</th>
        <th colspan="1">Sleeve Length</th>
        <th colspan="1">Purchase?</th>
      </tr>';

      $arrayLength = count($_SESSION["Cart"]);
      $i = 0;
      $cart = $_SESSION["Cart"];

      while ($i < $arrayLength) {

        $query = "SELECT * FROM `INVENTORY` WHERE shirtID = '$cart[$i]'";
        $result = $conn->query($query);
        $row = $result->fetch_array();

        echo '
          <tr>
            <td>'. $_SESSION["Cart"][$i] . '</td>
            <td>'. $row['price'] . '</td>
            <td>'. $row['quantity'] . '</td>
            <td>'. $row['size'] . '</td>
            <td>'. $row['color'] . '</td>
            <td>'. $row['sleeve'] . '</td>
            <td> <input type="radio" name="purchase_item"> </td>
          </tr>';
        $i++;
      }

    echo '</table>';

    $init_var = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (isset($_POST["purchase_item"]) && (!empty($_POST["purchase_item"]))) {

          $item_to_purchase = $_POST["purchase_item"];

          $init_var = false;

          echo "<br>Success: Purchase Complete!<br>";
      }

      else if (!$init_var) {

        echo "<br>Error: Could Not Complete Purchase!<br>";

      }

    }

?>

    <br> <input type="submit" id="submit" value="Purchase"> <br>

  </form>

</body>

</html>
