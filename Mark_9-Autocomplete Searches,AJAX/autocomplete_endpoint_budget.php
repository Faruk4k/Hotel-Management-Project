<?php

$server = "localhost";
$username = "fdemirel";
$mysql_password = "ydeaXA";
$database = "Group-30";

$mysqli = new mysqli($server, $username, $mysql_password, $database);

if ($mysqli->connect_error) {
    die("MySQL Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT budget FROM Customer");

$stmt->execute();

$result = $stmt->get_result();

$budgets = array();

while ($row = $result->fetch_assoc()) {
    $budgets[] =  (string) $row['budget'];
}

echo json_encode($budgets);

$stmt->close();
$mysqli->close();
?>