<!DOCTYPE html>
<html>
<head>
    <title>Login Result</title>
</head>
<body>
    <?php
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the MySQL database
    $servername = "localhost";  // Replace with your server name
    $usernameDB = "your_username";  // Replace with your MySQL username
    $passwordDB = "your_password";  // Replace with your MySQL password
    $dbname = "your_database";  // Replace with your database name

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if a matching record was found
    if ($result->num_rows > 0) {
        echo "<h2>Login successful!</h2>";
    } else {
        echo "<h2>Invalid username or password.</h2>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
