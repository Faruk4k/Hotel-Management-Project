<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Room Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $server = "localhost";
        $username = "fdemirel";
        $mysql_password = "ydeaXA";
        $database = "Group-30";

        $mysqli = new mysqli($server, $username, $mysql_password, $database);

        if ($mysqli->connect_error) {
            die("MySQL Connection failed: " . $mysqli->connect_error);
        }
        if (isset($_GET['room_number'])) {
            $room_number = $_GET['room_number'];

            $sql = "SELECT *
                    FROM Customer_rooms C 
                    WHERE C.room_number = ?";

        $stmt = $mysqli->prepare($sql);

        if ($stmt == false) {
            echo "Preparation Error: " . $mysqli->error;
        } else {
            $stmt->bind_param("i", $room_number);

            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Customer Room ID</th>';
                    echo '<th>Room number</th>';
                    echo '<th>Inspection check</th>';
                    echo '<th>Pricing</th>';
                    echo '</tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["customer_room_id"] . '</td>';
                        echo '<td>' . $row["room_number"] . '</td>';
                        echo '<td>' . $row["inspection_check"] . '</td>';
                        echo '<td>' . $row["pricing"] . '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo "No records found in the Customer_rooms table.";
                }

                echo '</table>';

                $result->free();
            } else {
                echo "Execution Error: " . $stmt->error;
            }

            $stmt->close();
            }
        }

    ?>
</body>
<a href="javascript: history.go(-1)">Go Back To Results</a>
