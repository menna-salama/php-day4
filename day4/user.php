<?php
$databaseFile = 'database.json';
$imageDir = 'upload';
$users = file_exists($databaseFile) ? json_decode(file_get_contents($databaseFile), true) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>
<body>
    <h2>Registered Users</h2>
    <table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user["name"]; ?></td>
        <td><?php echo $user["email"]; ?></td>
        <td>
            <img src="<?php echo "$imageDir/{$user["image"]}"; ?>" width="100" height="100">
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>