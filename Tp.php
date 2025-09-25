<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentenlijst</title>
    <style>
        /* Jouw CSS exact zoals je had */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2.2em;
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .student-table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .student-table th,
        .student-table td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .student-table th {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 14px;
        }

        .student-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .student-table tr:hover {
            background-color: #e8f4f8;
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        .student-table a {
            color: #0078d7;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .student-table a:hover {
            color: #005fa3;
            text-decoration: underline;
        }

        .btn-change {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
            color: white !important;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-change:hover {
            background: linear-gradient(135deg, #ee5a5a 0%, #dc4545 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(238, 90, 90, 0.3);
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
                padding: 15px;
            }

            .student-table {
                font-size: 14px;
            }

            .student-table th,
            .student-table td {
                padding: 10px;
            }

            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Studentenlijst</h1>
        <table class="student-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Achternaam</th>
                    <th>Klas</th>
                    <th>Tickets</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "mySql";
                $username = "root";
                $password = "password";
                $dbname = "Teamproject";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT ID, naam, achternaam, klas, tickets FROM Student";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['ID']) . "</td>";
                        echo "<td><a href='ShowStudent.php?ID=" . htmlspecialchars($row['ID']) . "'>" . htmlspecialchars($row['naam']) . "</a></td>";
                        echo "<td>" . htmlspecialchars($row['achternaam']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['klas']) . "</td>";
                        echo "<td><a class='btn-change' href='ChangeST.php?Naam=" . htmlspecialchars($row['naam']) . "'>CHANGE</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Geen studenten gevonden.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>