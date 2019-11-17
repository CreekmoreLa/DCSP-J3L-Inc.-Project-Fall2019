<!DOCTYPE html>
<html lang="en">

<head>

    <title>J3L's Shirt Shop Home Page</title>

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
            <th colspan="1">Shirt ID</th>
            <th colspan="1">Price</th>
            <th colspan="1">Quantity in Stock</th>
            <th colspan="1">Size</th>
            <th colspan="1">Color</th>
            <th colspan="1">Long or Short Sleeve</th>
          </tr>';

        while($row = $result->fetch_array()) {

          echo '
            <tr>
              <td>'. $row[shirtID] . '</td>
              <td>'. $row[price] . '</td>
              <td>'. $row[quantity] . '</td>
              <td>'. $row[size] . '</td>
              <td>'. $row[color] . '</td>
              <td>'. $row[color] . '</td>
            </tr>';


        }
        echo '</table>';

    ?>

</body>

</html>
