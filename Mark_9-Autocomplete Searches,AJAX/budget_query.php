<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title> Budget Query </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="script_budget.js"></script>
</head>
<body>
    <form action="budget.php" method="POST">
        <label for="budget"> Budget: </label><br>
        <input type="text" id="budget" name="budget" class="autocomplete"><br>
        <input type="submit" value="Search">
    </form>  
</body>