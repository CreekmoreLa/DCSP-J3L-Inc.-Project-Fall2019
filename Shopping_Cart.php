<?php

class shopping_cart() {

public $shopping_cart;

public function shopping_cart($shirtID) {
  $shopping_cart = array($shirtID);
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
  return $shirtID;
}

public function purchase($shirtID)
{
  foreach ($shopping_cart as $value) {
    unset($shopping_cart[$value]);
  }

}

}

?>
