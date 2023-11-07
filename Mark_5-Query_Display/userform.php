<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="user.php" method="POST"> 
        <label for="user_id">Are you adding a user or employee ("C" or "E"): </label><br>
        <input type="text" id="user_id" name="user_id"><br>
        <label for="first_name">First name: </label><br>
        <input type="text" id="first_name" name="first_name"><br>
        <label for="last_name">Last name: </label><br>
        <input type="text" id="last_name" name="last_name"><br>
        <label for="gender">Gender: </label><br>
        <input type="text" id="gender" name="gender"><br>
        <label for="date_of_birth">Date of birth: </label><br>
        <input type="date" id="date_of_birth" name="date_of_birth"><br>
        <label for="phone_number">Phone number: </label><br>
        <input type="text" id="phone_number" name="phone_number"><br>
        <label for="username">Username: </label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password: </label><br>
        <input type="text" id="password" name="password"><br> 
        <input type="submit" value="Submit">
    </form>
</body>
</html>
