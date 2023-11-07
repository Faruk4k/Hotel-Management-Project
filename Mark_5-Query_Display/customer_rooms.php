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
    $customer_id = "CR".substr(uniqid(), 0, rand(1, 6));
    $customer_room_id = $_POST["customer_room_id"];
    $room_number = $_POST["room_number"];
    $inspection_check = $_POST["inspection_check"];
    $pricing = $_POST["pricing"];
    
    $sql = "INSERT INTO Customer_Rooms(customer_room_id, room_number, inspection_check, pricing) VALUES (?, ?, ?, ?)";
    
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        echo "Preparation Error: " . $mysqli->error;
    } else {
        $stmt->bind_param("sbsi", $customer_room_id, $room_number, $inspection_check, $pricing);
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