<?php

$login = [];
$users = [];
$messages = [];
$send = [];

$ar = array('login' => $login, 'users' => $users, 'messages' => $messages, 'send' => $send);
return render('chat', $ar);