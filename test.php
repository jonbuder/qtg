<?php
$servername = "mysql.redub.io";
$username = "redubguest";
$password = "dontmeddle!!";
$database = "redub";
$sql = "SELECT FirstName, LastName FROM qtg";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
$result = $conn->query($sql);
}

if ($result->num_rows > 0) {
echo "<table id='QTG'><tr>";
echo "<th>FirstName</th>";
echo "<th>LastName</th>";
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row["FirstName"]."</td>";
echo "<td>".$row["LastName"]."</td></tr>";
}
echo "</table>";
} else {
echo "0 results";
}
$conn->close();

?>
