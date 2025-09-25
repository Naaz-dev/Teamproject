<?php

$conn = new mysqli("mySql", "root", "password", "Teamproject");

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$STNaam = $_GET['naam'] ?? '';
$STAchternaam = $_GET['achternaam'] ?? '';
$STKlas = $_GET['klas'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nieuweNaam = $_POST['nieuwe_naam'] ?? '';
    $nieuweAchternaam = $_POST['nieuwe_achternaam'] ?? '';
    $nieuweKlas = $_POST['nieuwe_klas'] ?? '';

    $stmt = $conn->prepare("UPDATE Student SET naam = ?, achternaam = ?, klas = ? WHERE naam = ?");
    $stmt->bind_param("ssis", $nieuweNaam, $nieuweAchternaam, $nieuweKlas, $STNaam);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Gegevens zijn aangepast.<br>";
    } else {
        echo "Geen wijzigingen doorgevoerd.<br>";
    }

    $stmt->close();
}
?>
<html>
<h2>Verander informatie</h2>
<form method="post">
    <p>Nieuwe Voornaam</p>
    <input type="text" name="nieuwe_naam" value="<?php echo htmlspecialchars($STNaam); ?>"><br><br>

    <p>Nieuwe Achternaam</p>
    <input type="text" name="nieuwe_achternaam" value="<?php echo htmlspecialchars($STAchternaam); ?>"><br><br>

    <p>Nieuwe Klas</p>
    <input type="text" name="nieuwe_klas" value="<?php echo htmlspecialchars($STKlas); ?>"><br><br>

    <input type="submit" value="Wijzig gegevens">
</form>
</hmtl>