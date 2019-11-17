<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<h2>Sign Up</h2>
<form method = "post" action = "make_account.php">
<label>Username</label>
<input type = "text" name "user_name" value "<?php echo $user_name;?>">
<label>Password</label>
<input type = "password" name = "psswrd">
<label>Email</label>
<input type = "email" name = "email" value = "<?php echo $email;?>">
<button type = "submit" name = "crte_acc">Create Account</button>
