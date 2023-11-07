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
    $admin_id = 'A'.substr(uniqid(), 0, rand(1,7));
    $eid = $_POST["eid"];
    $booking_management = $_POST["booking_management"];
    $employee_management = $_POST["employee_management"];
    
    $sql = "INSERT INTO Admin(admin_id, eid, booking_management, employee_management) VALUES (?, ?, ?, ?)";
    
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        echo "Preparation Error: " . $mysqli->error;
    } else {
        $stmt->bind_param("ssss", $admin_id, $eid, $booking_management, $employee_management);
        if ($stmt->execute()) {
            echo "Successful Insertion!";
        } else {
            echo "Insertion Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html>
    <body>
        <a href="maintenance.html"> Go Back to Maintenance Page </a>
    </body>
</html>