<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Manages Workers Table</title>
</head>
<body>

    <form action="manages_workers.php" method="POST"> 
        <label for="admin_id">Admin ID: </label>
        <input type="text" id="admin_id" name="admin_id"><br>
        <label for="staff_id">Staff ID: </label>
        <input type="text" id="staff_id" name="staff_id"><br>
        <input type="submit" value="Submit">
    </form>

    <div class="button-container">
            <button class="popup-button" onclick="openAdminTable()">Open Admin Table</button>
            <button class="popup-button" onclick="openRegularEmployeeTable()">Open Regular Employee Table</button>
    </div>

    <div id="AdminTableModal" class="modal">
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
                        echo '<th>Booking management</th>';
                        echo '<th>Employee management</th>';
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
                        echo "No records found in the Admin table.";
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

    <div id="RegularEmployeeTableModal" class="modal">
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
                        echo '<th>Employee ID</th>';
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
                        echo "No records found in the Regular Employee table.";
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
            document.getElementById('AdminTableModal').style.display = "block";
        }

        function closeAdminTable() {
            document.getElementById('AdminTableModal').style.display = "none";
        }

        function openRegularEmployeeTable() {
            document.getElementById('RegularEmployeeTableModal').style.display = "block";
        }

        function closeRegularEmployeeTable() {
            document.getElementById('RegularEmployeeTableModal').style.display = "none";
        }
    </script>
</body>
</html>
