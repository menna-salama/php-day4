<?php
$databaseFile = 'database.json';
$imageDir = 'upload';

if (!file_exists($databaseFile)) {
    file_put_contents($databaseFile, json_encode([], JSON_PRETTY_PRINT));
}

if (!is_dir($imageDir)) {
    mkdir($imageDir, 0777, true);
}

function register($data) {
    global $databaseFile, $imageDir;

    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $image = $_FILES['img'];

    $validExtensions = ['jpeg', 'jpg', 'png'];
    $imageSizeLimit = 1048576;
    $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    if (!in_array($imageExtension, $validExtensions)) {
        header('Location: register.php?message=Invalid image format');
        exit;
    }

    if ($image['size'] > $imageSizeLimit) {
        header('Location: register.php?message=Image must be less than 1MB');
        exit;
    }

    $newImageName = time() . '.' . $imageExtension;

    if (move_uploaded_file($image['tmp_name'], "$imageDir/$newImageName")) {
        $users = file_exists($databaseFile) ? json_decode(file_get_contents($databaseFile), true) : [];
        $users = is_array($users) ? $users : [];
        $users[] = ['name' => $name, 'email' => $email, 'password' => $password, 'image' => $newImageName];
        file_put_contents($databaseFile, json_encode($users, JSON_PRETTY_PRINT));

        header('Location: login.php');
        exit;
    } else {
        header('Location: register.php?message=Failed to upload image');
        exit;
    }
}

function login($data) {
    global $databaseFile;

    $email = $data['email'];
    $password = $data['password'];
    $users = file_exists($databaseFile) ? json_decode(file_get_contents($databaseFile), true) : [];
    $users = is_array($users) ? $users : [];

    foreach ($users as $user) {
        if ($user["email"] === $email && $user["password"] === $password) {
            header("Location:user.php");
            exit;
        }
    }

    header('Location: rejester.php?message=Invalid email or password ');
    exit;
}

if (isset($_POST['register'])) {
    register($_POST);
}

if (isset($_POST['login'])) {
    login($_POST);
}
?>