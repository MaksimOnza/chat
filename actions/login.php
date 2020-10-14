<?php

$login = $_REQUEST['login'] ?? '';
$reload_path = 'login';
$errors = [];

if (empty($login)) {
    return render($reload_path, ['errors' => $errors]);
}

$result = query_select("SELECT * FROM users WHERE name = ?", [1 => $login]);
$user = $result[0];
print_r($user);
if (empty($user['name'])) {
    $errors[] = ("Извините, введённый вами login неверный.");
}

if ($errors != []) {
    return render($reload_path, ['errors' => $errors]);
}
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
header('Location: /index.php?path=chat');