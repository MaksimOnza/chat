<?php
/**
 * @var $messages array
 * @var $users array
 */

?>

<?php
foreach ($messages as $message) {
    print '<div id="view_message">'
        . $message['message'] . '   <span id="view_date">'
        . date('Y-m-d', $message['current_time'] / 1000)
        . "\n" . date("H:i:s", $message['current_time'] / 1000) . '</span> ['
        . $message['author'] . ']' . '</div><br>';
}
?>



