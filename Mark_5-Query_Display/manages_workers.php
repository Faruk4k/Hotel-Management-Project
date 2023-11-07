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
    $admin_id = $_POST["admin_id"];
    $staff_id = $_POST["staff_id"];
    
    $sql = "INSERT INTO Manages_Workers(admin_id,staff_id) VALUES ( ?, ?)";
    
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        echo "Preparation Error: " . $mysqli->error;
    } else {
        $stmt->bind_param("ss", $admin_id, $staff_id);
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