<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="server.php" method="POST" enctype="multipart/form-data">
        <label>name</label>
        <input type="text" name="name" placeholder="Full Name" required><br><br><br>
        <label>email</label>
        <input type="email" name="email" placeholder="Email" required><br><br><br><br>
        <label>password</label>
        <input type="password" name="password" placeholder="Password" required><br><br><br><br>
        <input type="file" name="img" required><br><br><br><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>