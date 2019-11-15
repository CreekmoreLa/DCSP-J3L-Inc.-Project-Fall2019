<?php
    //$conn = ;

    session_start();

    if ($_SESSION['Logged in as User'] = true)
    {
        echo 'Welcome to your Account Page!';
        echo 'Username: ' . //username;
        echo 'Mailing Address: ' . //mailingAddress;
        echo 'Credit Card: ' . //creditCard; 
    }
    elif ($_SESSION['Logged in as Admin'] = true)
    {
        echo 'Welcome Admin!';
        echo 'Username: ' . //username;
        echo 'Mailing Address: ' . //mailingAddress;
        echo 'Credit Card: ' . //creditCard; 
    }
    
?>