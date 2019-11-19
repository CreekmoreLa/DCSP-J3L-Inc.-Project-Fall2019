<?php
session_start();
require_once('login.php');



if(isset($_POST['search']))
{
  $valueToSearch = $_POST['valueToSearch'];
  $query = "SELECT price, quantity, size, color, sleeve FROM INVENTORY LIKE '%".$valueToSearch."%'";
  $results = filterTable($query);
}
else{
  $query = "SELECT price, quantity, size, color, sleeve FROM INVENTORY";
  $result = filterTable($query);
}
function filterTable($query)
{
  $conn = new mysqli($hn, $un, $pw, $db)
  $filter_result = mysqli_query($conn, $query);
  return $filter_result
}


$conn->close();

?>
<!DOCTYPE html>
<html>
<style>
  table,tr,th,td
  {
    border: 1px solid black;
  }
  <body>
    <form>
      <table>
        <tr>
          <th>ShirtId</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Size</th>
          <th>Color</th>
          <th>Sleeve Style</th>
        </tr>
        <?php while($row = mysqli_fetch_array($result)):?>
          <tr>
            <td><?php echo $row['shirtID'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><?php echo $row['quantity'];?></td>
            <td><?php echo $row['size'];?></td>
            <td><?php echo $row['color'];?></td>
            <td><?php echo $row['sleeve'];?></td>
      <table>
    </form>
  </body>
</html>
