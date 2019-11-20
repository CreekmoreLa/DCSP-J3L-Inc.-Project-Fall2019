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
