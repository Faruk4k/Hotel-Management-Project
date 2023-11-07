
    <?php
    $server = "localhost"; 
    $username = "fdemirel";
    $mysql_password = "ydeaXA"; 
    $database = "Group-30";
    
    $mysqli = new mysqli($server, $username, $mysql_password, $database);
    
    if ($mysqli->connect_error) {
        die("MySQL Connection failed: " . $mysqli->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $staff_room_id = "SR".substr(uniqid(), 0, rand(1, 6));
        $room_number = $_POST["room_number"];
        $staff_id = $_POST["staff_id"];
        $staff_start = $_POST["staff_start"];
        $staff_end = $_POST["staff_end"];
        $sql = "INSERT INTO Staff_rooms(staff_room_id, room_number, staff_id, staff_start, staff_end) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt === false) {
            echo "Preparation Error: " . $mysqli->error;
        } else {
            $stmt->bind_param("sssss", $staff_room_id, $room_number, $staff_id, $staff_start, $staff_end);
            if ($stmt->execute()) {
                echo "Successful Insertion!";
            } else {
                echo "Insertion Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    ?>

<!DOCTYPE html>
<html>
    <body>
        <a href="maintenance.html"> Go Back to Maintenance Page </a>
    </body>
</html>