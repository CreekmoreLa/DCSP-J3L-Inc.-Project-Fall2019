<!DOCTYPE html>
<html lang = "en">
<head>

  <style>

      td, th {
      background-color: white;
      border: 1px solid;
      text-align: center;
      padding: 0.5em;
      }

      tbody {
      background-color: white;
      width:25%;
      text-align: center;
      }

      header {
      text-align: center;
      background-color: : #B6B6B4;
      }

  </style>

  <title>Search Results</title>

</head>

<body style ="background-color:#C24641; text-align: center;">

  <input type="button" id="home_page" onclick="document.location.href='homepage.php'" value="Back to Homepage">

  <br> <h1 style="background-color:#C24641; color:white;">Search Results: </h1> <br>

  <?php

  require_once('login.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  
  if ($conn->connect_error)
      die($conn->connect_error);

  $searchq = $_POST['valueToSearch'];
  $query = "SELECT * FROM INVENTORY WHERE shirtID LIKE '%".$searchq."%'
            OR price LIKE '%".$searchq."%' OR quantity LIKE '%".$searchq."%'
            OR size LIKE '%".$searchq."%' OR color LIKE '%".$searchq."%'
            OR sleeve LIKE '%".$searchq."%'";

  $result = $conn->query($query);
  $count = mysqli_num_rows($result);

  if ($count == 0) {
    $output = '<h3 style="background-color:#C24641; color:white;">There is no inventory that matches your search! <br> Please try your search again.</h3>';
    echo "$output";

  }

  else {
    echo '
    <table style="margin-left:auto;margin-right:auto;">
      <tr>
        <th colspan="1">Item #</th>
        <th colspan="1">Price</th>
        <th colspan="1">Quantity</th>
        <th colspan="1">Size</th>
        <th colspan="1">Color</th>
        <th colspan="1">Sleeve Length</th>
      </tr>';

      while($row = $result->fetch_array()){

          $shirtID = $row['shirtID'];
          $price = $row['price'];
          $quantity = $row['quantity'];
          $size = $row['size'];
          $color = $row['color'];
          $sleeve = $row['sleeve'];

          echo '
            <tr>
              <td>'. $shirtID . '</td>
              <td>'. $price . '</td>
              <td>'. $quantity . '</td>
              <td>'. $size . '</td>
              <td>'. $color . '</td>
              <td>'. $sleeve . '</td>
            </tr>';

          }

          echo '</table>';
    }

  ?>

</body>

</html>
