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

  <?php
require_once('Shirt.php');
$valid['success'] = array('success' => false, 'messages' => array());
if($_POST) {

  $shirtID = $_POST['shirtID'];
  $quantity 			= $_POST['editQuantity'];
  $size 			= $_POST['editSize'];
  $color 	= $_POST['editColor'];
  $sleeve 	= $_POST['editSleeve'];
  $productStatus 	= $_POST['productStatus'];

	$type = explode('.', $_FILES['productImage']['name']);
	$type = $type[count($type)-1];
	$url = '../assests/images/stock/'.uniqid(rand()).'.'.$type;
	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {
			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {

				$sql = "INSERT INTO product (shirt_id, product_image, size, color, quantity, sleeve, active, status)
				VALUES ('$shirtID', '$url', '$size', '$color', '$quantity', '$sleeve', '$productStatus', 1)";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

			}	else {
				return false;
   ?>

   <?php

   require_once('Shirt.php');

   valid['success'] = array('success' => false, 'messages' => array());

   $shirtID = $_POST['shirtID'];

   if($shirtID) {

    $sql = "UPDATE product SET active = 2, status = 2 WHERE product_id = {$shirtID}";
   
    if($connect->query($sql) === TRUE) {
    	$valid['success'] = true;
   	$valid['messages'] = "Successfully Removed";
    } else {
    	$valid['success'] = false;
    	$valid['messages'] = "Error while remove the brand";
    }
