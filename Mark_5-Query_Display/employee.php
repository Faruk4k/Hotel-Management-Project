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
        $eid = "EE".substr(uniqid(), 0, rand(1, 6));
        $user_id = $_POST["user_id"];
        $salary = $_POST["salary"];
        $contract_start = $_POST["contract_start"];
        $contract_end = $_POST["contract_end"];
        $sql = "INSERT INTO Employee(eid,user_id,salary,contract_start,contract_end) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt === false) {
            echo "Preparation Error: " . $mysqli->error;
        } else {
            $stmt->bind_param("sssss", $eid, $user_id, $salary, $contract_start, $contract_end);
            if ($stmt->execute()) {
                echo "Successful Insertion!";
            } else {
                echo "Insertion Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
    ?>

<!DOCTYPE html>
<html>
    <body>
        <a href="maintenance.html"> Go Back to Maintenance Page </a>
    </body>
</html>