<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Student</th>
            <th>klas</th>
            <th>Tickets</th>
        </tr>
        <?php
        $servername = "mySql";
        $username = "root";
        $password = "password";
        $dbname = "Teamproject";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT naam, ID, klas, tickets FROM Student";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</a></td>";
                echo "<td><a href='ShowTickets.php?name=" . $row['naam'] . "'>" . $row['naam'] . "</a></td>";
                echo "<td>" . $row['klas'] . "</td>";
                echo "<td>" . $row['tickets'] . "</td>";
                echo "</tr>";
            }


        }

        $conn->close();
        ?>

</body>

</html>