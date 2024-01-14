<?php
session_start();

// Check if the user is logged in and if they are marked as an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header("Location: login.php");
    exit;
}

// The rest of your maintenance page content goes here
?>



<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Maintenance page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="userform.php">User</a>
    <a href="roomsform.php">Rooms</a>
    <a href="staff_roomsform.php">Staff Rooms</a>
    <a href="customer_roomsform.php">Customer Rooms</a>
    <a href="customerform.php">Customer</a>
    <a href="employeeform.php">Employee</a>
    <a href="adminform.php">Admin</a>
    <a href="regular_employeeform.php">Regular employee</a>
    <a href="booksform.php">Books</a>
    <a href="manages_facilityform.php">Manages facility</a>
    <a href="manages_workersform.php">Manages workers</a>
    <a href="inspectsform.php">Inspects</a>
    <a href="dates_form.php">Filter by Date</a>
    <a href="types_form.php">Filter Rooms by Number of Bookings</a>
    <a href="booking_summary_form"> Filter by Customer's Bookings</a>
    <a href="budget_query.php"> Filter by Rooms by Budget</a>

    
    <form method="post" action=" logout.php ">
    <button type=" submit " name="logout">Log Out</button>
</form>

</body>