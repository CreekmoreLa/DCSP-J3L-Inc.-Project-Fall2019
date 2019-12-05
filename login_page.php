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

      <input type="button" id="home_page" onclick="document.location.href='homepage.php'" value="Back to Homepage">

        <?php

        $email_error = "";
        $password_error = "";
        $email = "";
        $password = "";

        require_once('login.php');

        if (isset($_SESSION['Logged in as User']) && !(empty($_SESSION['Logged in as User']))) {
          header("Location: homepage.php");
        }

        else if (isset($_SESSION['Logged in as Admin']) && !(empty($_SESSION['Logged in as Admin']))) {
          header("Location: homepage.php");
        }

        $connection = new mysqli($hn, $un, $pw, $db);

        if ($connection->connect_error) die($connection->connect_error);

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM USERS WHERE email = '$email'";
        $result = $connection->query($query);
        $row = $result->fetch_array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!(empty($_POST['email'])) && !(empty($_POST['password']))) {

                if (($password == $row['password']) && ($password != 'makemeadmin')) {
                    $cookie_name = 'User';
                    setcookie($cookie_name, $email);
                    $_SESSION['Logged in as User'] = true;
                    header("Location: homepage.php");
                }

                else if (($password == $row['password']) && ($password == 'makemeadmin')) {
                    $cookie_name = 'Admin';
                    setcookie($cookie_name, $email);
                    $_SESSION['Logged in as Admin'] = true;
                    header("Location: homepage.php");
                }

                else {
                  $email_error = "Error: Check the email you entered!";
                  $password_error = "Error: Check the password you entered!";

                }
            }
        }

        ?>

        <h1 style="background-color:#C24641; color:white; text-align:center;">Welcome to <span style="font-style:italic; font-weight:bold; color: maroon">J3L Inc.</span>!</h1><br>

        <form method="post" action="login_page.php">

          <div id="logincreds">
            <h3><label>Email: </label>
            <input type="text" name="email" value="<?php echo "$email" ?>"> <span class="error"><?php echo "$email_error" ?></span></h3>

            <h3><label>Password: </label>
            <input type="password" name="password" value="<?php echo "$password" ?>">  <span class="error"><?php echo "$password_error" ?></span></h3> <br>

            <input type="submit" value="Log in">
          </div>

        </form>

        <div id="movpgbtn">
          <p style="font-style:italic"><br>
            <h3>Click <a href="create_account.php">here</a> to create an account.</h3>
            <h3>Or simply visit our homepage as a guest by clicking <a href="homepage.php">here</a>.</h3>
          </p>
        </div>
      </body>
</html>
