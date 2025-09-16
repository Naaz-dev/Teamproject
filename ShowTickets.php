<?php
$servername = "mySql";
$username = "root";
$password = "password";
$dbname = "Teamproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ticketsvak FROM Student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ticketsvak'] . "</a></td>";
        echo "</tr>";
    }


}
?>