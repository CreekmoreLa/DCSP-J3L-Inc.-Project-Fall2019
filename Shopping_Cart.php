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

  <br> <h1>J3L's Shirt Shop Shopping Cart View</h1> <br>

  <input type="button" id="home_page" onclick="document.location.href='Homepage.php'" value="Back to Homepage">
  <input type="button" id="account_page" onclick="document.location.href='account.php'" value="Account Page"> <br>

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
    //array_push($cart, $item_to_add);

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

      $arrayLength = count($cart);
      $i = 0;
      while ($i < $arrayLength) {
        echo '
          <tr>
            <td>'. $cart[$i] . '</td>

          </tr>';
        $i++;
      }


    echo '</table>';

?>

</body>

</html>
