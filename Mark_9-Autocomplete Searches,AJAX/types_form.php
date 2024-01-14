<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title> Room type</title>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="types_script.js"></script>
</head>
<body>
    <h1> Filter by booking count: </h1>
    <form action="types_result.php" method="POST"> 
        <label for="booking_count">Bookings: </label><br>
        <input type="text" name="booking_count" min="1" class="autocomplete">
        <input type="submit" value="Search">
    </form>
</body>
</html>