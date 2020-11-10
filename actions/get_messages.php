<?php

namespace Chat;

use function Chat\db\query_select;

$current_time = $_POST['current_time'];
//query_select('DELETE FROM message_1 WHERE time_stamp < ?', [1 => $current_time]);

$messages = query_select('SELECT * FROM message_1 ORDER BY id DESC');

    //$id_last_message = reset($messages)['id'];
    //$_POST['id_end_message'] = reset($messages)['id'];
    //$content = array('messages' => $messages, 'id_end' => $id_last_message);


print render('chat_messages', ['messages' => $messages]);