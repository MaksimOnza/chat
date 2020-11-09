<?php

namespace Chat;

use function Chat\db\query_select;

$current_time = $_POST['current_time'];
query_select('DELETE FROM message_1 WHERE time_stamp < ?', [1 => $current_time]);

$messages = query_select('SELECT * FROM message_1 ORDER BY id DESC');
$users = query_select('SELECT name FROM users WHERE last_activity + '.USER_ACTIVITY.' > ' . $current_time);

print render('chat_messages', ['messages' => $messages, 'users' => $users]);