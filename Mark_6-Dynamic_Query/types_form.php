<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Customer Booking Details</title>
</head>
<body>
    <title>Room Booking Statistics</title>
    <h1> Filter by booking count: </h1>
    <form action="types_result.php" method="post">
        <label for="booking_count">Booking: </label><br>
        <input type="number" name="booking_count" min="1">
        <input type="submit" value="Search">
    </form>
</body>
</html>