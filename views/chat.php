<?php
/**
 * @var $messages array
 * @var $login array
 * @var $users array
 * @var $user string
 */

?>

<div class="_chat">chat_body
    <div class="_head_chat">
    <div id="login" class="_login">_login</div>
        <input id="reload_mess" class="_get_mess btn btn-outline-secondary btn-light" type="button" name="send" value="Reload messegaes">
    </div>
    <div class="_data">
        <div class="_messages ">_messages
            <?php
            foreach($messages as $message){
                print $message.'<br>';print $_SERVER['PATH_INFO'];
            }
            ?>
        </div>
        <div class="_users ">_users
            <?php
            foreach ($users as $user) {
                print $user . '<br>';
            }
            ?>
        </div>
    </div>
    <div class="_sender">
        <input id="message" class="_send_mess form-control form-control-file" name="message" type="text" value="value">
        <input id="chat_send" class="_btn btn btn-outline-secondary btn-light" type="button" name="send" value="Send">
    </div>
</div>