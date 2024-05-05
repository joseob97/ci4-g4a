<form method="post" action="<?= site_url('login') ?>">
    Alias: <input type="text" name="alias" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

<?php if(session()->getFlashdata('error')): ?>
    <p><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>
