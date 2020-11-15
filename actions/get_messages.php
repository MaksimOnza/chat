<?php

namespace Chat;

use function Chat\db\query_select;

$current_time = $_POST['current_time'];
query_select('DELETE FROM message_1 WHERE time_stamp < ?', [1 => $current_time]);

$messages = query_select('SELECT * FROM message_1 ORDER BY id DESC');

foreach($messages as &$row){
    foreach (EMOJY_ARRAY as $key => $value){
        $row['message'] = str_replace($key, "<img src='media/smilies/{$value}.gif'>", $row['message']);
    }
}

print render('chat_messages', ['messages' => $messages]);