<?php

$messages = query_select('SELECT * FROM message_1');
$user = 'maks';//$_SESSION['user_name'];

foreach ($messages as $mess){
    print $mess['author'].' -> '.$mess['message'].': '.$mess['time_stamp'].'<br>';
}


//return render('chat_messages', ['messages' => $messages, 'user' => $user]);