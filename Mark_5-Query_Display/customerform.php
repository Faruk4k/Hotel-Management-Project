<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Customer Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="customer.php" method="POST">

        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" required><br>
        <label for="budget">Budget:</label>
        <input type="number" name="budget" id="budget" required><br>
        <input type="submit" value="Submit">
    </form>

    <div class="button-container">
        <button class="popup-button" onclick="openTable1()">Open User Table</button>

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
                $sql = "SELECT user_id, first_name, last_name, gender, date_of_birth, phone_number FROM User";
                $result = $mysqli->query($sql);
                if ($result) {
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>User ID</th>';
                        echo '<th>First Name</th>';
                        echo '<th>Last Name</th>';
                        echo '<th>Gender</th>';
                        echo '<th>Date of Birth</th>';
                        echo '<th>Phone Number</th>';
                        echo '</tr>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["user_id"] . '</td>';
                            echo '<td>' . $row["first_name"] . '</td>';
                            echo '<td>' . $row["last_name"] . '</td>';
                            echo '<td>' . $row["gender"] . '</td>';
                            echo '<td>' . $row["date_of_birth"] . '</td>';
                            echo '<td>' . $row["phone_number"] . '</td>';
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
        function openTable1() {
            document.getElementById('TableModal1').style.display = "block";
        }

        function closeTable1() {
            document.getElementById('TableModal1').style.display = "none";
        }

    </script>
</body>

</html>