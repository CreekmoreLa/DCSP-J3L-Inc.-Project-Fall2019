<!DOCTYPE html>
<html lang="en">

    <head>

        <title>Logged Out</title>

    </head>

    <?php

        session_start();

        setcookie('User', null, -1);
        setcookie('Admin', null, -1);

        session_unset();
        session_destroy();

    ?>

    <body style="background-color:#C24641; color:white; text-align:center;">

      <div id="logoutpg">
        <h1>Logged Out</h1><br><br>

        <h3>Thanks for Shopping! <br> You are now logged out of the website!</h3><br><br>
        <p>
            <h3><a href="login_page.php">Log in</a> again.
            <br><br><a href="homepage.php">Homepage</a></h3>
        </p>
      </div>

    </body>
    
</html>
