<?php

class shopping_cart() {

$shopping_cart = array();

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
  // still thinking about this one...
}

public function purchase($shirtID)
{
  foreach ($shopping_cart as $value) {
    unset($shopping_cart[$value]);
  }
  
}

}

?>
