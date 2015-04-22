<?php
/**
 * UTI, path to magic
 *
 * User: bbr
 * Date: 25/03/15
 * Time: 01:21
 */
?>

<form method="post" action="" name="<?= $data->getName() ?>">
    <dl>
        <dt>Login</dt>
        <dd>
            <input type="text" name="<?= $data->getName() ?>[login]" value="<?= $data->getValue('login') ?>">
            <?= $data->isInvalid('login') ?>
        </dd>
        <dt>Password</dt>
        <dd>
            <input type="password" name="<?= $data->getName() ?>[paswd]" value="<?= $data->getValue('paswd') ?>">
            <?= $data->isInvalid('paswd') ?>
        </dd>
        <dd>
            <input type="submit" value=Login>
        </dd>
    </dl>
</form>
