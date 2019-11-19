<!DOCTYPE html>
<?php require_once('adduser.php'); ?>
<html>
<head>
<title></title>
</head>
<body>
<h2>Sign Up</h2>
<form method = "post" action = "make_account.php">
  <label>Email</label>
  <input type = "email" name = "email" value = "<?php echo $email;?>">
  <label>Username</label>
  <input type = "text" name "user_name" value "<?php echo $user_name;?>">
  <label>Password</label>
  <input type = "password" name = "psswrd">
  <label>Credit Card Number</label>
  <input type = "number" name = "cc_num" value = "<?php echo $cc_num;?>">
  <label>Address</label>
  <input type = "float" name = "mail_address" value = "<?php echo $mail_address;?>">
  <button type = "submit" name = "crte_acc">Create Account</button>
  <p>Account Holder <a href="login_page.php">Log in</a></p>
</form>
</body>
</html>
