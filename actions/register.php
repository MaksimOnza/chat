<?php
namespace Chat;
use function Chat\db\query;

$login = $_REQUEST['login'] ?? '';
$last_activity = time() ?? '';
$errors = [];

function valid_in_data($login, $last_activity, $errors = [])
{
    if (empty($login)) {
        $errors[] = ("Извините, Вы ввели не полные данные.");
        return false;
    }
    if(!is_integer($last_activity))
        return false;
    return true;
}

if (valid_in_data($login, $last_activity, $errors)) {
    query("INSERT INTO users(name, last_activity) VALUES(?,?)",
        [1 => $login, 2 => $last_activity]);
    header('Location: /index.php?path=login');
} else {
    return render($_REQUEST['path'], ['errors' => $errors]);
}
