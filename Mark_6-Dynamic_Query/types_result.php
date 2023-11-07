<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div>
        <table>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $booking_count = $_POST["booking_count"];

                $server = "localhost";
                $username = "fdemirel";
                $mysql_password = "ydeaXA";
                $database = "Group-30";


                $db_connection = mysqli_connect($server, $username, $mysql_password, $database);

                if (!$db_connection) {
                    die("Database connection failed: " . mysqli_connect_error());
                }


                $sql = "SELECT R.type, COUNT(*) AS booking_count
                FROM Rooms R
                INNER JOIN Customer_rooms CR ON CR.room_number = R.room_number
                INNER JOIN Books B ON B.customer_room_id = CR.customer_room_id
                GROUP BY R.type
                HAVING COUNT(*) = '$booking_count' ";


                $stmt = mysqli_prepare($db_connection, $sql);

                if ($stmt) {

                    mysqli_stmt_bind_param($stmt, "i", $booking_count);


                    mysqli_stmt_execute($stmt);


                    $result = mysqli_stmt_get_result($stmt);

                    if ($result) {

                        echo "<table>";
                        echo "<tr><th>Room Type</th><th>Booking Count</th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td><a href='types_result_details.php?type=" . urlencode($row['type']) . '&booking_count=' . urlencode($booking_count) . "'>" . $row['type'] . "</td><td>" . $row['booking_count'] . "</a></td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Query execution failed: " . mysqli_error($db_connection);
                    }


                    mysqli_stmt_close($stmt);
                } else {
                    echo "Prepared statement creation failed: " . mysqli_error($db_connection);
                }


                mysqli_close($db_connection);
            } else {
                echo "Invalid request method.";
            }
            ?>
        </table>
    </div>

    <div class="goBack">
        <a href="types_form.php"> Go Back </a>
    </div>
</body>

</html>