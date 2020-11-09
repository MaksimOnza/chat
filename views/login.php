<?php
/**
 * @var $errors string[]
 */
?>

<div id="_login">
    <h2>Главная страница</h2>
    <?php
    foreach ($errors as $er) {
        print $er;
    }
    ?>
    <div class="input-group input-group-prepend">
        <form action="" class="alert alert-warning" method="post">
            <p>
                <label>Ваш логин:<br></label>
                <input class="form-control form-control-file" name="login" type="text" size="15" maxlength="15">
            </p>
            <p>
                <input class="btn btn-outline-secondary btn-light " type="submit" name="submit" value="Войти">
                <br>
                <a href="index.php?path=register">Зарегистрироваться</a>
            </p>
        </form>
    </div>
    <div class="input-group input-group-prepend">
        <br>
    </div>
</div>
