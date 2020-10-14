<?php


$messages = query_select('SELECT * FROM message_1');
$user = '';//$_SESSION['user_name'];

//return render('chat_messages', ['messages' => $messages, 'user' => $user]);