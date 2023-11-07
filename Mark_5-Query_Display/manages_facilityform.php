<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Facility Management Table</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="manages_facility.php" method="POST">
        <label for="admin_id">Admin Id: </label><br>
        <input type="text" id="admin_id" name="admin_id"><br>
        <label for="room_number">Room Number: </label><br>
        <input type="text" id="room_number" name="room_number"><br>
        <input type="submit" value="Submit">
    </form>

    <div class="button-container">
            <button class="popup-button" onclick="openAdminTable()">Open Admin Table</button>
            <button class="popup-button" onclick="openRoomsTable()">Open Rooms Table</button>
    </div>

    <div id="adminModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeAdminTable()">&times;</span>
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

                $sql = "SELECT admin_id, eid, booking_management, employee_management FROM Admin";
                
                $result = $mysqli->query($sql);
                
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Admin ID</th>';
                        echo '<th>EID</th>';
                        echo '<th>Booking Management (T/F)</th>';
                        echo '<th>Employee Management (T/F)</th>';
                        echo '</tr>';
                
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["admin_id"] . '</td>';
                            echo '<td>' . $row["eid"] . '</td>';
                            echo '<td>' . $row["booking_management"] . '</td>';
                            echo '<td>' . $row["employee_management"] . '</td>';
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

    <div id="roomsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRoomsTable()">&times;</span>
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
        function openAdminTable() {
            document.getElementById('adminModal').style.display = "block";
        }

        function closeAdminTable() {
            document.getElementById('adminModal').style.display = "none";
        }

        function openRoomsTable() {
            document.getElementById('roomsModal').style.display = "block";
        }

        function closeRoomsTable() {
            document.getElementById('roomsModal').style.display = "none";
        }
    </script>
</body>
</html>