<?php

require_once('login.php');

$connection = new mysqli($hn, $un, $pw, $db);

if ($connection->connect_error) die($connection->connect_error);

class shirt() {

  public $shirtID, $quantity, $size, $color, $sleeve;

  public function shirt($param) {
    $shirtID = $param;
  }

  public function set_quantity($shirtID) {
    $query = "SELECT quantity FROM INVENTORY WHERE shirtID = '$shirtID'";
    $result = $connection->query($query);
    $row = $result->fetch_array();
    $quantity = $row[quantity];
  }

  public function set_size($shirtID) {
    $query = "SELECT size FROM INVENTORY WHERE shirtID = '$shirtID'";
    $result = $connection->query($query);
    $row = $result->fetch_array();
    $size = $row[size];
  }

  public function set_color($shirtID) {
    $query = "SELECT color FROM INVENTORY WHERE shirtID = '$shirtID'";
    $result = $connection->query($query);
    $row = $result->fetch_array();
    $color = $row[color];
  }

  public function set_sleeve($shirtID) {
    $query = "SELECT sleeve FROM INVENTORY WHERE shirtID = '$shirtID'";
    $result = $connection->query($query);
    $row = $result->fetch_array();
    $sleeve = $row[sleeve];
  }

}

?>
