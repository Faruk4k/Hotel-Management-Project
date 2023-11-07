<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Dates</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2 class = "datesFormHeader"> Filter Available Rooms by Dates </h2>
    <h4> (YearMonthDate) </h4>
    <form action="dates_result.php" method="POST">
        <label for="booking_start">Booking Start: </label><br>
        <input type="text" id="booking_start" name="booking_start"><br>
        <label for="booking_end">Booking End: </label><br>
        <input type="text" id="booking_end" name="booking_end"><br>
        <input type="submit" value="Search">
    </form>
</body>
</html>