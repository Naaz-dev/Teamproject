<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Ticket</title>
</head>

<body>
    <form action="CreateTicket.php" method="POST">
        <p>Nieuwe Ticket</p>
        Student <input type="Text" name="name" required><br>
        Vak <input type="Text" name="Subject" required><br>
        <input type="submit" value="Nieuwe Ticket">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $STName = $_POST["name"];
        $STVak = $_POST["Subject"];

        $servername = "mySql";
        $username = "root";
        $dbpassword = "password";
        $dbname = "Teamproject";

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE Student SET tickets = tickets + 1 WHERE naam = (?)");
        $stmt->bind_param("s", $STName);
        $stmt = $conn->prepare("INSERT INTO Student (Ticketsvak) VALUES (?)");
        $stmt->bind_param("s", $STVak);
        $stmt->execute();

        echo "Ticket Added.";


        $stmt->close();
        $conn->close();
    }
    ?>
    <p></p>
    <a href="TP.php">Go back</a>
</body>

</html>