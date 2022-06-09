<?php

namespace Chat;

use function Chat\db\query_select;

$login = $_REQUEST['login'] ?? '';
$reload_path = 'login';
$errors = [];
$guest = 'guest';

if (empty($login)) {
    return render($reload_path, ['errors' => $errors]);
}

$user = query_select("SELECT * FROM users WHERE name = ?", [1 => $login])[0];
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['session_id'] = session_id();

if (empty($user)) {
    $_SESSION['user_name'] = $guest;
    $_SESSION['user_id'] = 0;
    $_SESSION['session_id'] = session_id();
}

header('Location: /index.php?path=chat');
