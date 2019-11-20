<?php

require_once('Shirt.php');

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$shirtID = $_POST['shirtID'];
  $quantity 			= $_POST['editQuantity'];
  $size 			= $_POST['editSize'];
  $color 	= $_POST['editColor'];
  $sleeve 	= $_POST['editSleeve'];

  $sql = "UPDATE Shirt SET shirt_id = '$ShirtID', size = '$size', color = '$color', quantity = '$quantity', sleeve = '$sleeve', active = '$productStatus', status = 1 WHERE shirt_id = $shirtID ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

  ?>



   
