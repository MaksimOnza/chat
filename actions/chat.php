<?php

namespace Chat;

use function Chat\db\query_select;

$login = [];
$messages = [];

if (session_status() != SESSION_ACTIVE) {
    header('Location: /index.php?path=login');
}
$result = query_select('SELECT name FROM users');
$users = array();
foreach ($result as $user) {
    $users[] = $user['name'];
}

$content = array('login' => $login, 'users' => $users, 'messages' => $messages, 'emojy' => EMOJY_ARRAY);
return render('chat', $content);