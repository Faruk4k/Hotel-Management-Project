<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Customer Booking Details</title>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="script.js"></script>
</head>
<body>
    <form action="booking_summary_result.php" method="POST"> 
        <label for="customer_id">Customer ID: </label><br>
        <input type="text" id="customer_id" name="customer_id" class="autocomplete"><br>
        <input type="submit" value="Search">
    </form>
</body>
</html>
