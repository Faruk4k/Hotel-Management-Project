<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Employee Table</title>
</head>
<body>

    <form action="employee.php" method="POST"> 
        <label for="user_id">User ID: </label>
        <input type="text" id="user_id" name="user_id"><br>
        <label for="salary">Salary: </label>
        <input type="text" id="salary" name="salary"><br>
        <label for="contract_start">Contract start: </label>
        <input type="text" id="contract_start" name="contract_start"><br>
        <label for="contract_end">Contract end: </label>
        <input type="text" id="contract_end" name="contract_end"><br>
        <input type="submit" value="Submit">
    </form>

    <div class="button-container">
            <button class="popup-button" onclick="openUserTable()">Open User Table</button>
    </div>

    <div id="UserTableModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeUserTable()">&times;</span>
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

                $sql = "SELECT user_id, first_name, last_name FROM User";
                
                $result = $mysqli->query($sql);
                
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>User ID</th>';
                        echo '<th>First name</th>';
                        echo '<th>Last name</th>';
                        echo '</tr>';
                
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["user_id"] . '</td>';
                            echo '<td>' . $row["first_name"] . '</td>';
                            echo '<td>' . $row["last_name"] . '</td>';
                            echo '</tr>';
                        }
                
                        echo '</table>';
                    } else {
                        echo "No records found in the User table.";
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
        function openUserTable() {
            document.getElementById('UserTableModal').style.display = "block";
        }

        function closeUserTable() {
            document.getElementById('UserTableModal').style.display = "none";
        }
    </script>
</body>
</html>