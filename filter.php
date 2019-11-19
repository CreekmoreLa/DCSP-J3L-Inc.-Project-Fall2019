<?php
session_start();

$conn = new mysqli($hn, $un, $pw, $db)
if ($conn->connect_error){
  die("Connection Failed: " . $conn->connect_error);
}

$sql = "SELECT price, quantity, size, color, sleeve FROM INVENTORY";
$result = $conn->query($sql);

if($result->num_rows > 0){
  echo "<table><tr><th> Size </th><th> Color </th><th> Sleeve Style </th></tr>";
  while ($row = $result->fetch_assoc()){
    echo "<tr><td>".$row["price"]."</td><td>".$row["quantity"]."</td><td>".$row["size"]."</td><td>".$row["color"]."</td><td>".$row["sleeve"]."</td></tr>";
  }
  echo "</table>";
}
else{
  echo "0 results";
}
$conn->close();

?>
