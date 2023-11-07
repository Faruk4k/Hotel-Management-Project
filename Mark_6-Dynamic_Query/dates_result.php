<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Booking Dates Result</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <table>
            <?php

            $server = "localhost";
            $username = "fdemirel";
            $mysql_password = "ydeaXA";
            $database = "Group-30";

            $mysqli = new mysqli($server, $username, $mysql_password, $database);

            if ($mysqli->connect_error) {
                die("MySQL Connection failed: " . $mysqli->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $booking_start = $_POST["booking_start"];
                $booking_end = $_POST["booking_end"];
            }

            $sql = "SELECT R.room_number, R.type
                        FROM Rooms R 
                        INNER JOIN Customer_rooms CR on R.room_number = CR.room_number 
                        WHERE CR.inspection_check = 1 AND CR.customer_room_id NOT IN 
                        (SELECT B.customer_room_id  
                        FROM Books B 
                        WHERE B.start_date <= '$booking_end' AND '$booking_start' <= B.end_date)";

            $result = $mysqli->query($sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    echo '<table>';
                    echo '<tr>';
                    echo '<th>Room number</th>';
                    echo '<th>Type</th>';
                    echo '</tr>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td><a href="dates_result_details.php?room_number=' . $row["room_number"] . '&booking_start=' . urlencode($booking_start) . '&booking_end=' . urlencode($booking_end) . '">' . $row["room_number"] . '</a></td>';
                        echo '<td>' . $row["type"] . '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                } else {
                    echo "No records found in the Inspects table.";
                }

                $result->free();
            } else {
                echo "Query Error: " . $mysqli->error;
            }

            $mysqli->close();
            ?>
        </table>
    </div>
    <div class="goBack">
        <a href="dates_form.php"> Go Back </a>
    </div>
</body>

</html>