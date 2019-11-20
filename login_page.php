<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log in to J3L Inc., the Shirt Store for You!</title>
        <style>
            input {
                margin-bottom: 0.5em;
            }
        </style>
    </head>
    <body style="background-color:#C24641; color:white; text-align:center;">
        <?php

        require_once('login.php');

        if (isset($_SESSION['Logged in as User']) && !(empty($_SESSION['Logged in as User']))) {
          header("Location: Homepage.php");
        }

        else if (isset($_SESSION['Logged in as Admin']) && !(empty($_SESSION['Logged in as Admin']))) {
          header("Location: Homepage.php");
        }

        $connection = new mysqli($hn, $un, $pw, $db);

        if ($connection->connect_error) die($connection->connect_error);

        $email = stripslashes($_POST['email']);
        $password = stripslashes($_POST['password']);

        $query = "SELECT * FROM USERS WHERE email = '$email'";
        $result = $connection->query($query);
        $row = $result->fetch_array();


        if (!(empty($_POST['email'])) && !(empty($_POST['password']))) {

            if (($password == $row['password']) && ($password != 'makemeadmin')) {
                $cookie_name = 'User';
                setcookie($cookie_name, $email);
                $_SESSION['Logged in as User'] = true;
                header("Location: Homepage.php");
            }

            else if (($password == $row['password']) && ($password == 'makemeadmin')) {
                $cookie_name = 'Admin';
                setcookie($cookie_name, $email);
                $_SESSION['Logged in as Admin'] = true;
                header("Location: Homepage.php");
            }

            else {
              $error_login = "You have entered something incorrectly.";
              echo "$error_login";
            }
        }

        ?>

        <h1 style="background-color:#C24641; color:white; text-align:center;">Welcome to <span style="font-style:italic; font-weight:bold; color: maroon">
                J3L Inc.</span>!</h1>

        <p style="color: red">
        <?php echo "$error_msg" ?>
        </p>

        <form method="post" action="login_page.php">
          <div id="logincreds">
            <label>Email: </label>
            <input type="text" name="email"> <br>
            <label>Password: </label>
            <input type="password" name="password"> <br>
            <input type="submit" value="Log in">
          </div>
        </form>

        <div id="movpgbtn">
          <p style="font-style:italic">
            <br>Click <a href="create_account.php">here</a> to create an account.
            <br>Visit Homepage without logging in by clicking <a href="Homepage.php">here</a>.
          </p>
        </div>
      </body>
</html>
