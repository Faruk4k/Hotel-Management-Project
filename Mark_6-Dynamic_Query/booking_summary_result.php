<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];

    $server = "localhost"; 
    $username = "fdemirel";
    $mysql_password = "ydeaXA"; 
    $database = "Group-30";
    
    $mysqli = new mysqli($server, $username, $mysql_password, $database);
    
    if ($mysqli->connect_error) {
        die("MySQL Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT B.start_date,B.end_date,C.customer_id,U.first_name,U.last_name,R.room_number 
    FROM Books B 
    INNER JOIN Customer C ON B.customer_id=C.customer_id AND C.customer_id='$customer_id' 
    INNER JOIN User U ON C.user_id=U.user_id 
    INNER JOIN Customer_rooms R ON B.customer_id='$customer_id' AND B.customer_room_id=R.customer_room_id 
    INNER JOIN Returning_customer T ON B.customer_id=T.customer_id AND T.booking_count>1;
    ";

    $result = $mysqli->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Start date</th>';
            echo '<th>End date</th>';
            echo '<th>Customer ID</th>';
            echo '<th>First name</th>';
            echo '<th>Last name</th>';
            echo '<th>Room number</th>';
            echo '</tr>';
    
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["start_date"] . '</td>';
                echo '<td>' . $row["end_date"] . '</td>';
                echo '<td>'. $row["customer_id"] . '</td>';
                echo '<td>'. $row["first_name"] . '</td>';
                echo '<td>'. $row["last_name"] . '</td>';
                echo '<td><a href="booking_summary_result_details.php?room_number='  . $row["room_number"] . '">' . $row["room_number"] . '</a></td>';
                echo '</tr>';
            }
    
            echo '</table>';
        } else {
            echo "Customer has only one or no bookings.";
        }
    
        $result->free();
    } else {
        echo "Query Error: " . $mysqli->error;
    }

    $mysqli->close();
}
    ?>
    </div>
    <div class="goBack">
        <a href="booking_summary_form.php">Go back</a>
    </div>
</body>
</html>

