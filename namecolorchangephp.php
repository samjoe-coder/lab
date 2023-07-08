<!DOCTYPE html>
<html>
<head>
    <title>Colorful Page</title>
    <style>
        body {
            background-color: <?php echo $_POST['color']; ?>;
            color: green;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo $_POST['name']; ?>!</h1>
</body>
</html>
