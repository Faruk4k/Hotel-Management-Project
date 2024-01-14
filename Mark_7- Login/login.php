
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script type="text/javascript">
        
        window.onload = function() {
            var url = window.location.href;
            if(url.indexOf("?error=invalid_credentials") !== -1) {
                alert('Invalid credentials. Please try again.');
            }
        };
    </script>
</head>
<body>
    <form action="authenticate.php" method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

