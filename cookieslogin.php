<!DOCTYPE html>
<html>
<head>
    <title>Save and Retrieve Usernames/Passwords</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" name="save" value="Save">
        <input type="submit" name="retrieve" value="Retrieve">
    </form>

<?php
if (!isset($_COOKIE['usernames']) || !isset($_COOKIE['passwords'])) {
    $usernames = array();
    $passwords = array();
} else {
    $usernames = unserialize($_COOKIE['usernames']);
    $passwords = unserialize($_COOKIE['passwords']);
}

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usernames[] = $username;
    $passwords[] = $password;

    setcookie('usernames', serialize($usernames), time() + 3600); // Expires in 1 hour
    setcookie('passwords', serialize($passwords), time() + 3600); // Expires in 1 hour

    echo "Username and password saved.";
}

if (isset($_POST['retrieve'])) {
    if (count($usernames) > 0 && count($passwords) > 0) {
        echo "<h2>Saved Usernames and Passwords:</h2>";
        echo "<ul>";
        for ($i = 0; $i < count($usernames); $i++) {
            echo "<li><strong>Username:</strong> " . $usernames[$i] . "</li>";
            echo "<li><strong>Password:</strong> " . $passwords[$i] . "</li>";
            echo "<br>";
        }
        echo "</ul>";
    } else {
        echo "No usernames and passwords are saved.";
    }
}
?>
</body>
</html>
