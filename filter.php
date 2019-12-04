<?php
session_start();
require_once('login.php');
$conn = new mysqli($hn, $un, $pw, $db);

$output = '';

if(isset($_POST['valueToSearch']))
{
  $searchq = $_POST['valueToSearch'];
  $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
  $query = "SELECT shirtID, price, quantity, size, color, sleeve FROM INVENTORY LIKE '%".$valueToSearch."%'";
  $count = mysqli_num_rows($query);
  if($count == 0){
    $output = 'There was no search results';
  }

//  else{
  //  while($row = mysqli_fetch_array($query)){
  //    $shirtID = $row['shirtID'];
  //    $price = $row['price'];
  //    $quantity = $row['quantity'];
  //    $size = $row['size'];
  //    $color = $row['color'];
  //    $sleeve = $row['sleeve'];

  //    $output .= '<div>'.$shirtID. ' '.$price. ' '.$quantity. ' '.$size ' '.$color. ' '.$sleeve '</div>';
  //  }
  //}
}

?>
<!DOCTYPE html>
<html lang = "en">
<head>
  <title>Search Results</title>
</head>
<body>
  <?php print("$output");?>
</body>
<html>
