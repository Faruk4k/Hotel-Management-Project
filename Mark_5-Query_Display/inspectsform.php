<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="inspects.php" method="POST"> 
        <label for="room_number">Room number: </label>
        <input type="text" id="room_number" name="room_number"><br>
        <label for="staff_id">Staff ID: </label>
        <input type="text" id="staff_id" name="staff_id"><br>
        <input type="submit" value="Submit">
    </form>

    <!-- Buttons to open the modal pop-ups -->
    <div class="button-container">
            <button class="popup-button" onclick="openRegularEmployeeTable()">Open Regular Employee Table</button>
            <button class="popup-button" onclick="openRoomTable()">Open Room Table</button>
    </div>

    <!-- Regular Employee Table Modal -->
    <div id="regularEmployeeModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRegularEmployeeTable()">&times;</span>
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

                $sql = "SELECT staff_id, eid, department FROM Regular_employee";
                
                $result = $mysqli->query($sql);
                
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Staff ID</th>';
                        echo '<th>EID</th>';
                        echo '<th>Department</th>';
                        echo '</tr>';
                
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["staff_id"] . '</td>';
                            echo '<td>' . $row["eid"] . '</td>';
                            echo '<td>' . $row["department"] . '</td>';
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
    </div>

    <!-- Room Table Modal -->
    <div id="roomTableModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRoomTable()">&times;</span>
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
                        echo '<th>Room number</th>';
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
    </div>

    <script>
        function openRegularEmployeeTable() {
            document.getElementById('regularEmployeeModal').style.display = "block";
        }

        function closeRegularEmployeeTable() {
            document.getElementById('regularEmployeeModal').style.display = "none";
        }

        function openRoomTable() {
            document.getElementById('roomTableModal').style.display = "block";
        }

        function closeRoomTable() {
            document.getElementById('roomTableModal').style.display = "none";
        }
    </script>
</body>
</html>
