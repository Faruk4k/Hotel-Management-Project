<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Books Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="books.php" method="POST">
        <label for="customer_id">Customer ID: </label><br>
        <input type="text" id="customer_id" name="customer_id"><br>
        <label for="customer_room_id">Customer Room ID: </label><br>
        <input type="text" id="customer_room_id" name="customer_room_id"><br>
        <label for="start_date">Start Date: </label><br>
        <input type="date" id="start_date" name="start_date"><br>
        <label for="end_date">End Date: </label><br>
        <input type="date" id="end_date" name="end_date"><br>
        <input type="submit" value="Submit">
    </form>

    <div class="button-container">
        <button class="popup-button" onclick="openTable1()">Open Customer Table</button>
        <button class="popup-button" onclick="openTable2()">Open Customer rooms Table</button>
    </div>

    <div id="TableModal1" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTable1()">&times;</span>
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
                $sql = "SELECT customer_id, user_id, budget FROM Customer";
                $result = $mysqli->query($sql);
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Customer ID</th>';
                        echo '<th>User ID</th>';
                        echo '<th>Budget</th>';
                        echo '</tr>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["customer_id"] . '</td>';
                            echo '<td>' . $row["user_id"] . '</td>';
                            echo '<td>$' . $row["budget"] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo "No records found in the Customer table.";
                    }
                    $result->free();
                } else {
                    echo "Query Error: " . $mysqli->error;
                }
                $mysqli->close();
                ?>
            </table>
        </div>
    </div>

    <div id="TableModal2" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTable2()">&times;</span>
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
                $sql = "SELECT customer_room_id, room_number, inspection_check, pricing FROM Customer_rooms";
                $result = $mysqli->query($sql);
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Customer Room ID</th>';
                        echo '<th>Room Number</th>';
                        echo '<th>Inspection Check</th>';
                        echo '<th>Pricing</th>';
                        echo '</tr>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["customer_room_id"] . '</td>';
                            echo '<td>' . $row["room_number"] . '</td>';
                            echo '<td>' . ($row["inspection_check"] ? 'Yes' : 'No') . '</td>';
                            echo '<td>$' . $row["pricing"] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo "No records found in the Customer Rooms table.";
                    }
                    $result->free();
                } else {
                    echo "Query Error: " . $mysqli->error;
                }
                $mysqli->close();
                ?>
            </table>
        </div>
    </div>

    <script>
        function openTable1() {
            document.getElementById('TableModal1').style.display = "block";
        }

        function closeTable1() {
            document.getElementById('TableModal1').style.display = "none";
        }

        function openTable2() {
            document.getElementById('TableModal2').style.display = "block";
        }

        function closeTable2() {
            document.getElementById('TableModal2').style.display = "none";
        }
    </script>
</body>

</html>
