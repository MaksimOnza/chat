<?php
/**
 * @var $messages array
 * @var $login array
 * @var $users array
 * @var $user string
 */
?>
<div id="chat_header">
    <div id="chat_login">
        <?php if (in_array($_SESSION['user_name'], $users)) { ?>
        <form method="post" action="/index.php?path=logout">
            <a id="login" href="index.php?path=logout">LogOut</a>
        </form>
        <?php }else{ ?>
        <a id="login" href="index.php?path=login">LogIn</a>
        <?php } ?>
    </div>
    <div id="title">Simple chat <h5 id="_login"><?= $_SESSION['user_name'] ?></h5></div>
</div>
<div id="chat_content">
    <div id="d_messages" class="_messages "></div>
    <div id="d_users" class="_users "></div>
</div>
<?php if (in_array($_SESSION['user_name'], $users)) {
    print '
    <div id="_send">
        <div id="s_input" class="form-control form-control-file" contenteditable="true"></div>
        <div id="smiles">
            emojy
            <div id="hide">' ?>
    <?php
    foreach ($emojy as $smile => $image) {
        print '<img class="smile" src="media/smilies/' . $image . '.gif" title="' . $smile . '" alt="' . $image . '">';
    }
    ?>
    <?php
    print '
            </div>
        </div>
        <input id="s_btn" class="btn btn-outline-secondary btn-light" type="button" name="send" value="Send"">
    </div>';
} ?>

<input id="reload_mess" class="_get_mess btn btn-outline-secondary btn-light" type="button" name="send" value="Reload messegaes">
<?php  print ($_SERVER['PHP_SELF'].' df'); ?>

