<?php
$servername = "mySql";
$username = "root";
$password = "password";
$dbname = "Teamproject";

$studentID = $_GET['ID'] ?? '';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbinding mislukt " . $conn->connect_error);
}

if (!empty($studentID)) {
    $stmt = $conn->prepare("SELECT ID, naam, achternaam, klas, tickets FROM Student WHERE ID = ?");
    $stmt->bind_param("i", $studentID);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Studentinformatie</h2>";
        echo "<h4>ID:</h4> " . ($row["ID"]) . "<br>";
        echo "<h4>Naam:</h4> " . ($row["naam"]) . " " . ($row["achternaam"]) . "<br>";
        echo "<h4>Klas:</h4> " . ($row["klas"]) . "<br>";
        echo "<h4>Tickets:</h4> " . ($row["tickets"]) . "<br>";
    } else {
        echo "Geen student gevonden met ID: " . ($studentID);
    }
    $stmt = $conn->prepare("SELECT tckvak, tckbesch FROM Tickets WHERE tckstudent = ?");
    $stmt->bind_param("s", $row["naam"]);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Ticket</h2>";
        echo "<h4>Vak:</h4> " . ($row["tckvak"]) . "<br>";
        echo "<h4>Beschrijving:</h4> " . ($row["tckbesch"]) . "<br>";
        $stmt->close();
    } else {
        echo "Geen Ticket";
    }
}

$conn->close();
?>