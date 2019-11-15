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

        require_once 'login.php';

        session_start();

        if (isset($_SESSION['Logged in as User']) && !(empty($_SESSION['Logged in as User']))) {
          header("Location: user_page.php");
        }

        else if (isset($_SESSION['Logged in as Admin']) && !(empty($_SESSION['Logged in as Admin']))) {
          header("Location: admin_page.php");
        }

        $connection = new mysqli($hn, $un, $pw, $db);

        if ($connection->connect_error) die($connection->connect_error);

        $username = stripslashes($_POST['username']);
        $password = stripslashes($_POST['password']);

        $query = "SELECT * FROM lab4_users WHERE username = '$username'";
        $result = $connection->query($query);
        $row = $result->fetch_array();

        if (!(empty($_POST['username'])) && !(empty($_POST['password']))) {

            if (($password == $row['password']) && ($row['type'] == 'user')) {
                    $full_name = $row['forename'] .= " ";
                    $full_name = $full_name .= $row['surname'];
                    $cookie_name = 'User';
                    setcookie($cookie_name, $full_name);
                    $_SESSION['Logged in as User'] = true;
                    header("Location: user_page.php");
            }

            else if (($password == $row['password']) && ($row['type'] == 'admin')) {
                    $full_name = $row['forename'] .= " ";
                    $full_name = $full_name .= $row['surname'];
                    $cookie_name = 'Admin';
                    setcookie($cookie_name, $full_name);
                    $_SESSION['Logged in as Admin'] = true;
                    header("Location: admin_page.php");
            }

            else {
              $error_msg = "You have entered an incorrect username/password combination. Please try again.";
            }
        }

        ?>
        <h1>Welcome to <span style="font-style:italic; font-weight:bold; color: maroon">
                Great Web Application</span>!</h1>

        <p style="color: red">
        <?php echo "$error_msg" ?>
        </p>

        <form method="post" action="login_page.php">
            <label>Username: </label>
            <input type="text" name="username"> <br>
            <label>Password: </label>
            <input type="password" name="password"> <br>
            <input type="submit" value="Log in">
        </form>

        <p style="font-style:italic">
            Placeholder for "forgot password" link<br><br>
            Placeholder for "create account" link
        </p>
</html>
