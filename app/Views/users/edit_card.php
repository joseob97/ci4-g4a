<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarjeta - G4A</title>
    <link rel="stylesheet" href="<?= base_url('estilos.css'); ?>">
</head>
<body>
    <div id="header">
        <h1>Editar Tarjeta</h1>
    </div>

    <?= form_open('users/cards/update'); ?>
        <input type="hidden" name="id_tarjeta" value="<?= esc($card['id_tarjeta']); ?>">
        <input type="hidden" name="id_usuario" value="<?= esc($user_id); ?>">
        Número de Tarjeta: <input type="text" name="numero" value="<?= esc($card['numero']); ?>"><br>
        Titular: <input type="text" name="titular" value="<?= esc($card['titular']); ?>"><br>
        Caducidad (MM/YY): <input type="text" name="caducidad" value="<?= esc(date('m/Y', strtotime($card['caducidad']))); ?>"><br>
        <input type="submit" value="Actualizar Tarjeta">
    <?= form_close(); ?>

    <a href="<?= site_url('users/cards/' . $user_id); ?>">Volver a lista de tarjetas</a>
</body>
</html>
