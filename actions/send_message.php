<?php

$message = $_POST['message'];
$current_time = $_POST['current_time'];
$user = $_POST['user'];

$query = "INSERT INTO message_1(author, message, time_stamp) VALUES(?, ?, ?)";
query($query ,[1 => $user, 2 => $message, 3 => $current_time]);