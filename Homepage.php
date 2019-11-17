<!DOCTYPE html>
<html lang="en">

<head>

    <title>J3L's Shirt Shop Home Page</title>

    <style>
            td, th {
            border: 1px solid;
            text-align: center;
            padding: 0.5em;
            }

            tbody {
            width:25%
            }
    </style>

</head>

<body>

    <input type="button" id="shopping_cart" onclick="shopping_cart()" value="Shopping Cart">

    <input type="text" id="search_bar" onkeyup="myFunction()" placeholder="Search here...">


    <br> <h1> Welcome to the Homepage of J3L's Shirt Shop! </h1> <br>

    <br> <h2> These are the shirts that we currently have in stock: </h2> <br>

    <?php

    require_once('login.php');

      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error)
          die($conn->connect_error);

      $query = "SELECT * FROM `INVENTORY`";
      $result = $conn->query($query);

        echo '
        <table>
          <tr>
            <th colspan="1">ShirtID</th>
            <th colspan="1">Price</th>
            <th colspan="1">Quantity</th>
            <th colspan="1">Size</th>
            <th colspan="1">Color</th>
            <th colspan="1">Sleeve Length</th>
            <th colspan="1">Purchase?</th>
          </tr>';

        while($row = $result->fetch_array()) {

          echo '
            <tr id="'. $row[shirtID] . '">
              <td>'. $row[shirtID] . '</td>
              <td>'. $row[price] . '</td>
              <td>'. $row[quantity] . '</td>
              <td>'. $row[size] . '</td>
              <td>'. $row[color] . '</td>
              <td>'. $row[sleeve] . '</td>
              <td> <input type="button" id="add_to_cart" onclick="" value="Add to Cart"> </td>
            </tr>';

        }
        echo '</table>';

    ?>

</body>

</html>
