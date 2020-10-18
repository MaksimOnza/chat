<?php

$message = '3new message';
$current_time = 123456789;
$user = 'maks';


//$query = "INSERT INTO message_1(author, message, time_stamp) VALUES(?, ?, ?)";
$query = "INSERT INTO message_1(author, message, time_stamp) VALUES(?, ?, ?)";
query($query ,[1 => $user, 2 => $message, 3 => $current_time]);

return 1;