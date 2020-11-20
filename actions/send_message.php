<?php

namespace Chat;

use function Chat\db\query;
use function Chat\db\query_select;

$message = $_POST['message'];
$current_time = $_POST['current_time'];
$final_time = $current_time + LIFE_TIMES;
$user = $_SESSION['user_name'];


$message = str_replace("<script>{*}</script>", "--", $message);
$trans = array(">" => "&gt; ", "<" => "&lt; ", "\n" => "", "\r" => "",
    "\"" => "&quot;", "'" => "&quot;");
$message = strtr($message, $trans);


/*$users = query_select('SELECT name FROM users WHERE last_activity + '.USER_ACTIVITY.' > ' . $current_time);
$pos = strpos($message, '/dm/');
if ($pos === 0) {
    preg_match( '/dm/%/', $message, $match );
    if(in_array($user, $users)){
        print 'хер моржовый';
    }
}*/

$query = "INSERT INTO message_1(author, message, time_stamp, current_time) VALUES(?, ?, ?, ?)";
query($query, array(1 => $user, $message, $final_time, $current_time));

$query = "UPDATE users SET last_activity = ? WHERE name = ?";
query($query, array(1 => $current_time, $user));