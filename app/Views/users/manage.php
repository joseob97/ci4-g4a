<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Usuarios - G4A</title>
    <link rel="stylesheet" href="<?= base_url('estilos.css'); ?>">
</head>
<body>
    <div id="header">
        <h1>Gestionar Usuarios</h1>
    </div>

    <div id="buscador">
        <?= form_open('users/search'); ?>
            <input type="text" name="busqueda" placeholder="Buscar por alias o correo...">
            <input type="submit" value="Buscar">
        <?= form_close(); ?>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Alias</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id_usuario']; ?></td>
                <td><?= $user['alias']; ?></td>
                <td><?= $user['correo']; ?></td>
                <td>
                    <a href="<?= site_url('users/edit/'.$user['id_usuario']); ?>">Editar</a> |
                    <a href="<?= site_url('users/delete/'.$user['id_usuario']); ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a> |
                    <a href="<?= site_url('users/cards/'.$user['id_usuario']); ?>">Listar Tarjetas</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="<?= site_url('menu'); ?>">Volver al menú principal</a>
</body>
</html>
