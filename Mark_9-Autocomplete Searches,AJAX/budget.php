<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Budget Query </title>
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

                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $budget = $_POST["budget"];
                }

                $sql = "SELECT C.room_number
                        FROM Customer_rooms C 
                        WHERE C.pricing <= $budget";

                $result = $mysqli->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Room number</th>';
                        echo '</tr>';

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td><a href="budget_result.php?room_number=' . $row["room_number"] . '&budget=' . urlencode($budget) . '">' . $row["room_number"] . '</a></td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                    } else {
                        echo "No records found in the Customer_rooms table.";
                    }
                    
                    $result->free();
                } else {
                    echo "Execution Error: " . $stmt->error;
                }

            $mysqli->close();
            ?>
        </table>
    </div>
    <div class="goBack">
        <a href="budget_query.php"> Go Back </a>
    </div>
</body>
</html>