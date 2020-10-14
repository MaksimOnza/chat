<?php
ini_set('session.gc_maxlifetime', 86400);
ini_set('session.cookie_lifetime', 0);
session_set_cookie_params(0);
session_start();

require_once("sqlite/db.php");

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$errors = [];
$path = $_REQUEST['path'];
$list_of_path = array(
    "login",
    "register",
    "send_message",
    "get_users",
    "get_messages",
    "chat",
);

function run_action($path, $list_of_path): string
{
    $action = in_array($path, $list_of_path) ? 'actions/' . $path . '.php' : 'actions/error_404.php';
    return include $action;
}

function render($path, array $vars = []): string
{
    extract($vars);
    ob_start();
    require_once 'views/' . $path . '.php';
    $content = ob_get_contents();
    ob_clean();
    return $content;
}

$content = run_action($path, $list_of_path);
$template = render('base_template', ['content' => $content]);
print $template;