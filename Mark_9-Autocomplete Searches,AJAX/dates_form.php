<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Booking Dates</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="autocomplete_dates.js"></script>
</head>

<body>
    <h2 class="datesFormHeader"> Filter Available Rooms by Dates </h2>
    <h4> (Year-Month-Date) </h4>
    <form action="dates_result.php" method="POST">
        <label for="booking_start">Booking Start: </label><br>
        <input type="text" id="booking_start" name="booking_start" class="autostart"><br>
        <label for="booking_end">Booking End: </label><br>
        <input type="text" id="booking_end" name="booking_end" class="autoend"><br>
        <input type="submit" value="Search">
    </form>
</body>

</html>
