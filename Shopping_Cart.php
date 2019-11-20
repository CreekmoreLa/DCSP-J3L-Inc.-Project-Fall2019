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

<body>

  <div id="shcrtbtns">
    <input type="button" id="home_page" onclick="document.location.href='Homepage.php'" value="Back to Homepage">
    <input type="button" id="account_page" onclick="document.location.href='account.php'" value="Account Page"> <br>
  </div>

  <div id="shopcarttitle">
    <br> <h1>J3L's Shirt Shop Shopping Cart View</h1> <br>
  </div>

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

    $cart = [$item_to_add];

    echo '
    <table>
      <tr>
        <th colspan="1">ShirtID</th>
        <th colspan="1">Price</th>
        <th colspan="1">Quantity</th>
        <th colspan="1">Size</th>
        <th colspan="1">Color</th>
        <th colspan="1">Sleeve Length</th>
      </tr>';

      require_once('login.php');

      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error)
          die($conn->connect_error);

      $arrayLength = count($cart);
      $i = 0;

      while ($i < $arrayLength) {

        $query = "SELECT * FROM `INVENTORY` WHERE shirtID = '$cart[$i]'";
        $result = $conn->query($query);
        $row = $result->fetch_array();

        echo '
          <tr>
            <td>'. $cart[$i] . '</td>
            <td>'. $row['price'] . '</td>
            <td>'. $row['quantity'] . '</td>
            <td>'. $row['size'] . '</td>
            <td>'. $row['color'] . '</td>
            <td>'. $row['sleeve'] . '</td>
          </tr>';
        $i++;
      }

    echo '</table>';

?>

  <input type="submit" id="purchase" value="Purchase"> <br>

  <form method="post" action="Shopping_Cart.php">

  </form>

</body>

</html>
