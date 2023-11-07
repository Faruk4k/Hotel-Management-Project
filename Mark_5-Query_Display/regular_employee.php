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
    $staff_id = 'S'.substr(uniqid(), 0, rand(1,7));
    $eid = $_POST["eid"];
    $department = $_POST["department"];
    
    $sql = "INSERT INTO Regular_employee (staff_id, eid, department) VALUES (?, ?, ?)";
    
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        echo "Preparation Error: " . $mysqli->error;
    } else {
        $stmt->bind_param("sss", $staff_id, $eid, $department);
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

<html>
    <body>
        <a href="maintenance.html"> Go Back to Maintenance Page </a>
    </body>
</html>