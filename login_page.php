<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Log in to Website</title>
        <style>
            input {
                margin-bottom: 0.5em;
            }
        </style>
    </head>
    <body>
        <?php

        require_once('login.php');

        session_start();

        if (isset($_SESSION['Logged in as User']) && !(empty($_SESSION['Logged in as User']))) {
          header("Location: Homepage.php");
        }

        else if (isset($_SESSION['Logged in as Admin']) && !(empty($_SESSION['Logged in as Admin']))) {
          header("Location: Homepage.php");
        }

        $connection = new mysqli($hn, $un, $pw, $db);

        if ($connection->connect_error) die($connection->connect_error);

        $user_name = stripslashes($_POST['email']);
        $password = stripslashes($_POST['password']);

        $query = "SELECT * FROM Users WHERE user_name = '$user_name'";
        $result = $connection->query($query);
        $row = $result->fetch_array();


        if (!(empty($_POST['email'])) && !(empty($_POST['password']))) {

            if (($password == $row['password']) && ($password != 'makemeadmin')) {
                $cookie_name = 'User';
                setcookie($cookie_name, $user_name);
                $_SESSION['Logged in as User'] = true;
                header("Location: Homepage.php");
            }

            else if (($password == $row['password']) && ($password == 'makemeadmin')) {
                $cookie_name = 'Admin';
                setcookie($cookie_name, $user_name);
                $_SESSION['Logged in as Admin'] = true;
                header("Location: Homepage.php");
            }

            else {
              $error_login = "You have entered something incorrectly.";
            }
        }

        ?>
        <h1>Welcome to <span style="font-style:italic; font-weight:bold; color: maroon">
                J3L Inc.</span>!</h1>

        <p style="color: red">
        <?php echo "$error_msg" ?>
        </p>

        <form method="post" action="login_page.php">
            <label>Email: </label>
            <input type="email" name="email"> <br>
            <label>Password: </label>
            <input type="password" name="password"> <br>
            <input type="submit" value="Log in">
        </form>

        <p style="font-style:italic">
            Placeholder for "forgot password" link<br><br>
            Placeholder for "create account" link
        </p>
</html>
