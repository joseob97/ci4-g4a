<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario - G4A</title>
    <link rel="stylesheet" href="<?= base_url('estilos.css'); ?>">
</head>
<body>
    <div id="header">
        <h1>Editar Usuario</h1>
    </div>

    <?= form_open('users/update'); ?>  <!-- Asegúrate de que esta ruta está correctamente definida en tu archivo Routes.php -->
        <input type="hidden" name="id_usuario" value="<?= esc($user['id_usuario']); ?>">
        Alias: <input type="text" name="alias" value="<?= esc($user['alias']); ?>" required><br>
        Nueva Contraseña: <input type="password" name="password_nueva"><br>
        Confirmar Nueva Contraseña: <input type="password" name="password_confirmacion"><br>
        Correo: <input type="email" name="correo" value="<?= esc($user['correo']); ?>" required><br>
        Nombre Completo: <input type="text" name="nombre" value="<?= esc($user['nombre']); ?>" required><br>
        País: <input type="text" name="pais" value="<?= esc($user['pais']); ?>" required><br>
        Ciudad: <input type="text" name="ciudad" value="<?= esc($user['ciudad']); ?>" required><br>
        Calle: <input type="text" name="direccion" value="<?= esc($user['direccion']); ?>" required><br>
        Código postal: <input type="text" name="cod_postal" value="<?= esc($user['cod_postal']); ?>" required pattern="[0-9]{5}" title="Debe contener exactamente 5 dígitos"><br><br>
        <input type="submit" value="Guardar cambios">
    <?= form_close(); ?>

    <a href="<?= site_url('gestionar_usuarios'); ?>">Volver a gestionar usuarios</a>
</body>
</html>
