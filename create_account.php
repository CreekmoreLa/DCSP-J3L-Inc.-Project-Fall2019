<!DOCTYPE HTML>
<html lang = "en">
<head>

    <title> Create Your Account </title>

</head>

<body style="background-color:#C24641; color:white; text-align:center;">

  <input type="button" id="home_page" onclick="document.location.href='homepage.php'" value="Back to Homepage">

  <br> <h1 style="background-color:#C24641; color:white; text-align:center;"> Create an account here: </h1> <br>

    <?php

    $email = $user_name = $password = $cc_num = $mail_address = "";
    $email_error = $user_name_error = $password_error = $cc_num_error = $mail_address_error = "";

    $create_account_button = "<input type = 'submit' value = 'Create Account' name = 'create_account'>";
    $login_text = "";

    require_once('login.php');
    $connection = new mysqli($hn, $un, $pw, $db);

    $safe1 = $safe2 = $safe3 = $safe4 = $safe5 = FALSE;

    if ($connection->connect_error) die($connection->connect_error);

    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $cc_num = $_POST['cc_num'];
    $mail_address = $_POST['mail_address'];
    $reward_points = "0";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($_POST["email"]) || empty($_POST["email"]) || (preg_match("/^[a-zA-Z0-9]+@[a-z.]+[a-z.]+[a-z]$/", $_POST["email"])) == FALSE) {
          $email_error = "Invalid email format";

        }

        else {
          $safe1 = TRUE;
        }

        if (!isset($_POST["user_name"]) || empty($_POST["user_name"]) || (preg_match("/^[a-zA-Z ]*$/", $_POST["user_name"])) == FALSE) {
          $user_name_error = "Your name must consist of letters and white space";

        }

        else {
          $safe2 = TRUE;
        }

        if (!isset($_POST["password"]) || empty($_POST["password"])) {
          $password_error = "You must enter a password.";

        }

        else {
          $safe3 = TRUE;
        }

        if (!isset($_POST["cc_num"]) || empty($_POST["cc_num"]) || (filter_var($_POST["cc_num"], FILTER_VALIDATE_INT) == FALSE) || $_POST["cc_num"] <= 999999999999999) {
          $cc_num_error = "You must enter a valid credit card number.";

        }

        else {
          $safe4 = TRUE;
        }

        if (!isset($_POST["mail_address"]) || empty($_POST["mail_address"])) {
          $mail_address_error = "You must enter a mail address.";

        }

        else {
          $safe5 = TRUE;
        }

        if ($safe1 && $safe2 && $safe3 && $safe4 && $safe5) {
          $create_account_button = "";
          $login_text = "<p>Now that you have created an account, you can <a href='login_page.php'>login</a> here.</p></h3>";

          $query = "INSERT INTO USERS (email, user_name, password, cc_num, mail_address, reward_points) VALUES
                   ('$email', '$user_name', '$password', '$cc_num', '$mail_address', '$reward_points')";

          $result = $connection->query($query);

        }

    }

    ?>

    <form method = "post" action = "create_account.php">
        <br>
        <h3><label>Email: </label> <input type = "text" name = "email" value="<?php echo "$email" ?>"> <span class="error"><?php echo "$email_error" ?></span>
        <br>

        <br>
        <label>Username: </label> <input type = "text" name = "user_name" value="<?php echo "$user_name" ?>"> <span class="error"><?php echo "$user_name_error" ?></span>
        <br>

        <br>
        <label>Password: </label> <input type = "password" name = "password" value="<?php echo "$password" ?>"> <span class="error"><?php echo "$password_error" ?></span>
        <br>

        <br>
        <label>Card Number: </label> <input type = "password" name = "cc_num" value="<?php echo "$cc_num" ?>"> <span class="error"><?php echo "$cc_num_error" ?></span>
        <br>

        <br>
        <label>Address: </label> <input type = "text" name = "mail_address" value="<?php echo "$mail_address" ?>"> <span class="error"><?php echo "$mail_address_error" ?></span>
        <br>

        <br><br>
        <?php echo "$create_account_button" ?>
        <br>

        <br><br>
        <?php echo "$login_text" ?>
        <br>

      </form>

</body>

</html>
