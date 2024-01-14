<?php

$server = "localhost";
$username = "fdemirel";
$mysql_password = "ydeaXA";
$database = "Group-30";

$mysqli = new mysqli($server, $username, $mysql_password, $database);

if ($mysqli->connect_error) {
    die("MySQL Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT DISTINCT
                                DATE_FORMAT(start_date, '%Y-%m-%d') AS formatted_start_date, 
                                DATE_FORMAT(end_date, '%Y-%m-%d') AS formatted_end_date 
                          FROM Books");

$stmt->execute();

$result = $stmt->get_result();

$dates = array();
while ($row = $result->fetch_assoc()) {
    $dates[] = (string)$row['formatted_start_date'];
    $dates[] = (string)$row['formatted_end_date'];
}
echo json_encode($dates);

$stmt->close();
$mysqli->close();
?>
