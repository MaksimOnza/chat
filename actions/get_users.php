<?php

namespace Chat;

use function Chat\db\query_select;

$current_time = $_POST['current_time'];

$users = query_select('SELECT name FROM users WHERE last_activity + '.USER_ACTIVITY.' > ' . $current_time);

print render('chat_users', ['users' => $users]);