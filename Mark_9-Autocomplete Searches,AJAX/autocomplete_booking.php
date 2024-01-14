<?php

$server = "localhost";
$username = "fdemirel";
$mysql_password = "ydeaXA";
$database = "Group-30";

$mysqli = new mysqli($server, $username, $mysql_password, $database);

if ($mysqli->connect_error) {
    die("MySQL Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT customer_id FROM Customer");



$stmt->execute();


$result = $stmt->get_result();

$customerIDs = array();
while ($row = $result->fetch_assoc()) {
    $customerIDs[] = $row['customer_id'];
}

echo json_encode($customerIDs);

$stmt->close();
$mysqli->close();
?>
