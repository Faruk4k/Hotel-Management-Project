<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Customer Rooms Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="Customer_Rooms.php" method="POST">
        <label for="room_number">Room Number:</label>
        <input type="number" name="room_number" id="room_number" required><br>
        <label for="inspection_check">Inspection Check(1/0):</label>
        <input type="text" name="inspection_check" id="inspection_check"><br>
        <label for="pricing">Pricing:</label>
        <input type="number" name="pricing" id="pricing" required><br>
        <input type="submit" value="Submit">
    </form>


    <div class="button-container">
        <button class="popup-button" onclick="openTable1()">Open Rooms Table</button>

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
                $sql = "SELECT room_number, capacity, type FROM Rooms";
                $result = $mysqli->query($sql);
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Room Number</th>';
                        echo '<th>Capacity</th>';
                        echo '<th>Type</th>';
                        echo '</tr>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["room_number"] . '</td>';
                            echo '<td>' . $row["capacity"] . '</td>';
                            echo '<td>' . $row["type"] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo "No records found in the Rooms table.";
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

    </script>
</body>

</html>