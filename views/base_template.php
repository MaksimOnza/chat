<?php
/**
 * @var $content string
 */

use function Chat\render;
?>
<?= render('header'); ?>

    <?= $content ?>

<?= render('footer'); ?>