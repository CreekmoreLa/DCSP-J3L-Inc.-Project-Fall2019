<?php
    session_start();

    require_once('login.php');

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error)
        die($conn->connect_error);

    $query = "SELECT * FROM mailing_address WHERE email = "" AND password = """
    $query2 = "SELECT * FROM username WHERE email = "" AND password = """
    $query3 = "SELECT * FROM credit_card WHERE email = "" AND password = """

    $result = $conn->query($query);

    session_start();

    if ($_SESSION['Logged in as User'] = true)
    {
        echo 'Welcome to your Account Page ' . user_name . "!";
        echo 'Rewards Points: ' . reward_points;
        echo 'Mailing Address: ' . mail_address;
        echo 'Credit Card info: ' . cc_num;
    }
    elif ($_SESSION['Logged in as Admin'] = true)
    {
        echo 'Welcome Admin' . user_name . "!"r;
        echo 'Rewards Points: ' . reward_points;
        echo 'Mailing Address: ' . mail_address;
        echo 'Credit Card info: ' . cc_num;
    }

?>
