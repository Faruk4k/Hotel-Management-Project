<?php
$server = "localhost";
$username = "fdemirel";
$mysql_password = "ydeaXA";
$database = "Group-30";

$mysqli = new mysqli($server, $username, $mysql_password, $database);

if ($mysqli->connect_error) {
    die("MySQL Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    if($user_id == 'C')
    {
        $user_id = 'C'.substr(uniqid(), 0, rand(1, 7));
    }
    else if($user_id == 'E')
    {
        $user_id = 'E'.substr(uniqid(), 0, rand(1, 7));
    }
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $birth_date = $_POST["date_of_birth"];
    $phone = $_POST["phone_number"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "INSERT INTO User(user_id, first_name, last_name, gender, date_of_birth, phone_number, username, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $mysqli->prepare($sql);
    
    if ($stmt === false) {
        echo "Preparation Error: " . $mysqli->error;
    } else {
        $stmt->bind_param("ssssssss", $user_id, $first_name, $last_name, $gender, $birth_date, $phone, $username, $password);
        if ($stmt->execute()) {
            echo "Successful Insertion!";
        } else {
            echo "Insertion Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
    <body>
        <a href="maintenance.html"> Go Back to Maintenance Page </a>
    </body>
</html>
