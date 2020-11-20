<?php

namespace Chat;

use function Chat\db\query_select;

$current_time = $_POST['current_time'];
$user = $_SESSION['user_name'];
$private_message = [];


query_select('DELETE FROM message_1 WHERE time_stamp < ?', [1 => $current_time]);

$messages = query_select('SELECT * FROM message_1 ORDER BY id DESC');


foreach ($messages as &$row) {
    $message = $row['message'];
    foreach (EMOJY_ARRAY as $key => $value) {
        $row['message'] = str_replace($key, "<img src='media/smilies/{$value}.gif'>", $row['message']);
    }
    if (strpos($message, '/dm') === 0) {
        $start = strpos($message, ' ');
        $end = strpos(substr($message,$start+1), ' ');
        $name = substr($message, $start+1, $end);
        if (trim($name) != $user) {
            $row['message'] = '';
        }else{
            $row['message'] = substr($message, $end + strlen($name));
        }
    }
}

print render('chat_messages', ['messages' => $messages, 'private_message' => $private_message]);