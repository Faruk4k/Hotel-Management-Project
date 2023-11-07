<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>User Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="admin.php" method="POST"> 
        <label for="eid">EID: </label>
        <input type="text" id="eid" name="eid"><br>
        <label for="booking_management">Booking management:</label>
        <input type="text" id="booking_management" name="booking_management"><br>
        <label for="employee_management">Employee management:</label>
        <input type="text" id="employee_management" name="employee_management"><br>
        <input type="submit" value="Submit">
    </form>

    <div class="button-container">
        <button class="popup-button" onclick="openEmployeeTable()">Open Employee Table</button>
    </div>

    <div id="EmployeeModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEmployeeTable()">&times;</span>
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

                $sql = "SELECT eid, user_id, salary, contract_start, contract_end FROM Employee";
                
                $result = $mysqli->query($sql);
                
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>EID</th>';
                        echo '<th>User ID</th>';
                        echo '<th>Salary</th>';
                        echo '<th>Contract start</th>';
                        echo '<th>Contract end</th>';
                        echo '</tr>';
                
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["eid"] . '</td>';
                            echo '<td>' . $row["user_id"] . '</td>';
                            echo '<td>' . $row["salary"] . '</td>';
                            echo '<td>' . $row["contract_start"] . '</td>';
                            echo '<td>' . $row["contract_end"] . '</td>';
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
        function openEmployeeTable() {
            document.getElementById('EmployeeModal').style.display = "block";
        }

        function closeEmployeeTable() {
            document.getElementById('EmployeeModal').style.display = "none";
        }
    </script>
</body>