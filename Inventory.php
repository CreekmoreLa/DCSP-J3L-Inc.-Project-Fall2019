<?php

require_once('Shirt.php');

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$shirtID = $_POST['shirtID'];
  $quantity 			= $_POST['editQuantity'];
  $size 			= $_POST['editSize'];
  $color 	= $_POST['editColor'];
  $sleeve 	= $_POST['editSleeve'];
