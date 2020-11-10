<?php

namespace Chat;

use function Chat\db\query;

$message = $_POST['message'];
$current_time = $_POST['current_time'];
$final_time = $current_time + LIFE_TIMES;
$user = $_SESSION['user_name'];

$query = "INSERT INTO message_1(author, message, time_stamp, current_time) VALUES(?, ?, ?, ?)";
query($query, array(1 => $user, $message, $final_time, $current_time));

$query = "UPDATE users SET last_activity = ? WHERE name = ?";
query($query, array(1 => $current_time, $user));