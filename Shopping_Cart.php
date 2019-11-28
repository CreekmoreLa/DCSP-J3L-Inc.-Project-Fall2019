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

class shopping_cart {

  public $shopping_cart;

  public function shopping_cart($shirtID) {
    $shopping_cart = array($shirtID);
    return $shopping_cart;
  }

  public function add_item($shirtID)
  {
    array_push($shopping_cart, $shirtID);
  }

  public function remove_item($shirtID)
  {
    foreach (array_keys($shopping_cart, $shirtID) as $value) {
      unset($shopping_cart[$key]);
    }
    $shopping_cart = array_values($shopping_cart);
  }

  public function view_item($shirtID)
  {
    return $shopping_cart[shirtID];
  }

  public function purchase($shirtID)
  {
    foreach ($shopping_cart as $value) {
      unset($shopping_cart[$value]);
    }

}

}

  $item_to_add = $_POST["add_to_cart"];
  if(!isset($_SESSION["Cart"])){
    $_SESSION["Cart"] = array($item_to_add);
  }
  else {
    array_push($_SESSION["Cart"], $item_to_add);
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

      require_once('login.php');

      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error)
          die($conn->connect_error);

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
