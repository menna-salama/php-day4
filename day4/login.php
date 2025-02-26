<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php if (isset($_GET['message'])): ?>
        <p style="color: red;"><?php echo ($_GET['message']); ?></p>
    <?php endif; ?>
    <h2>Login</h2>
    <form action="server.php" method="POST">
        <label>email</label>
        <input type="email" name="email" placeholder="Email" required><br><br><br>
        <label> password</label>
        <input type="password" name="password" placeholder="Password" required><br><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>