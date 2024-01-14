<?php

$server = "localhost";
$username = "fdemirel";
$mysql_password = "ydeaXA";
$database = "Group-30";

$mysqli = new mysqli($server, $username, $mysql_password, $database);

if ($mysqli->connect_error) {
    die("MySQL Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT R.type, COUNT(*) AS booking_count
FROM Rooms R
INNER JOIN Customer_rooms CR ON CR.room_number = R.room_number
INNER JOIN Books B ON B.customer_room_id = CR.customer_room_id
GROUP BY R.type
HAVING COUNT(*) ");



$stmt->execute();


$result = $stmt->get_result();

$bookingcounts = array();
while ($row = $result->fetch_assoc()) {
    $bookingcounts[] = (string)$row['booking_count'];
}

echo json_encode($bookingcounts);

$stmt->close();
$mysqli->close();
?>