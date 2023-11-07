<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    if (isset($_GET['type'])) {
       
        $roomType = $_GET['type'];
        $booking_count = $_GET['booking_count'];
 
        $server = "localhost";
        $username = "fdemirel";
        $mysql_password = "ydeaXA";
        $database = "Group-30";

        $db_connection = mysqli_connect($server, $username, $mysql_password, $database);

        if (!$db_connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM Rooms WHERE type = '$roomType'";
        $stmt = mysqli_prepare($db_connection, $sql);

        if ($stmt) {
         
            mysqli_stmt_bind_param($stmt, "s", $roomType);
            mysqli_stmt_execute($stmt);

          
            $result = mysqli_stmt_get_result($stmt);

            echo "<table>";
            echo "<tr><th>Room Number</th><th>Capacity</th><th>Room Type</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row['room_number'] . "</td><td>" . $row['capacity'] . "</td><td>" . $row['type'] . "</td></tr>";
            }
            echo "</table>";
            
            mysqli_stmt_close($stmt);
        } else {
            echo "Query execution failed: " . mysqli_error($db_connection);
        }

      
        mysqli_close($db_connection);
    }

    echo '<a class="goBack" href="types_result.php?booking_count=' . urlencode($booking_count) . '">Go Back to Results</a>';
    ?>
    
</body>

</html>
