<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Dates Result Details</title>
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

        $sql = "SELECT R.room_number, R.type, R.capacity, CR.pricing
                    FROM Rooms R 
                    INNER JOIN Customer_rooms CR on R.room_number = CR.room_number
                    WHERE R.room_number = ?";

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
                    echo '<th>Room Number</th>';
                    echo '<th>Type</th>';
                    echo '<th>Capacity</th>';
                    echo '<th>Pricing</th>';
                    echo '</tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["room_number"] . '</td>';
                        echo '<td>' . $row["type"] . '</td>';
                        echo '<td>' . $row["capacity"] . '</td>';
                        echo '<td>' . $row["pricing"] . '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo "No records found.";
                }

                $result->free();
            } else {
                echo "Execution Error: " . $stmt->error;
            }

            $stmt->close();
        }
    }
    $booking_start = $_GET["booking_start"];
    $booking_end = $_GET["booking_end"];

    echo '<a class="goBack" href="dates_result.php?booking_start=' . urlencode($booking_start) . '&booking_end=' . urlencode($booking_end) . '">Go Back to Results</a>';
    ?>
</body>