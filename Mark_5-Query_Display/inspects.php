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
        $room_number = $_POST["room_number"];
        $staff_id = $_POST["staff_id"];
        
        $sql = "INSERT INTO Inspects(room_number, staff_id) VALUES (?, ?)";
        
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt === false) {
            echo "Preparation Error: " . $mysqli->error;
        } else {
            $stmt->bind_param("ss", $room_number, $staff_id);
            if ($stmt->execute()) {
                echo "Successful Insertion!";
            } else {
                echo "Insertion Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
?>

<html>
    <body>
        <a href="maintenance.html"> Go Back to Maintenance Page </a>
    </body>
</html>