<!DOCTYPE HTML>
<html lang = "en">

<head>

    <title> Create Account </title>
    <style>
    div {
      display: block;
    }
    </style>

</head>

<body>

    <br> <h1> Create an account here: </h1> <br>

    <?php

    $email = "";
    $user_name = "";
    $password = "";
    $cc_num = "";
    $mail_address = "";
    $reward_points = "0";

    require_once('login.php');

    $connection = new mysqli($hn, $un, $pw, $db);

    if ($connection->connect_error) die($connection->connect_error);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if ((isset($_POST["email"]) && (!empty($_POST["email"]))) && (isset($_POST["user_name"]) && (!empty($_POST["user_name"])))
          && (isset($_POST["password"]) && (!empty($_POST["password"]))) && (isset($_POST["cc_num"]) && (!empty($_POST["cc_num"])))
          && (isset($_POST["mail_address"]) && (!empty($_POST["mail_address"])))) {

        $email = $_POST['email'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $cc_num = $_POST['cc_num'];
        $mail_address = $_POST['mail_address'];
        $reward_points = "0";

        $query = "INSERT INTO USERS (email, user_name, password, hash, cc_num, mail_address, reward_points) VALUES
                 ('$email', '$user_name', '$password', '$hash', '$cc_num', '$mail_address', '$reward_points')";

        $result = $connection->query($query);

      }

      else {
        echo "You didn't complete all the fields. Please try again.";
      }

    }

    ?>

    <form method = "post" action = "create_account.php">

        <label>Email</label> <input type = "email" name = "email">

        <div> <label>Username</label> <input type = "text" name = "user_name"></div>

        <label>Password</label> <input type = "password" name = "password">

        <div> <label>Credit Card Number</label> <input type = "text" name = "cc_num"></div>

        <label>Address</label> <input type = "text" name = "mail_address">

        <div><input type = "submit" value = "Create Account" name = "create_account"></div>

        <p>After you create an account, you can <a href="login_page.php">Log in</a></p>

      </form>

</body>

</html>
