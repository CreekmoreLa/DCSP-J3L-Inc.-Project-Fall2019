<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Logged Out</title>
    </head>
    <?php

        // remove session and session cookie
        session_start();

        setcookie('User', null, -1);
        setcookie('Admin', null, -1);


        session_unset();
        session_destroy();

    ?>
    <body style="background-color:#C24641; color:white; text-align:center;">
      <div id="logoutpg">
        <h1>Logged Out</h1>
        <p>
            You are now logged out of the website.
        </p>
        <p>
            <a href="login_page.php">Log in</a> again.
            <br><br><a href="Homepage.php">Homepage</a>
        </p>
      </div>
    </body>
</html>
