<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tarjetas del Usuario</title>
    <link rel="stylesheet" href="<?= base_url('estilos.css'); ?>">
</head>
<body>
    <div id="header">
        <h1>Listado de Tarjetas</h1>
    </div>
    <table>
        <tr>
            <th>ID Tarjeta</th>
            <th>Número</th>
            <th>Caducidad</th>
            <th>Titular</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($cards as $card): ?>
        <tr>
            <td><?= $card['id_tarjeta']; ?></td>
            <td><?= $card['numero']; ?></td>
            <td><?= $card['caducidad']; ?></td>
            <td><?= $card['titular']; ?></td>
            <td>
                <a href="<?= site_url('users/cards/edit/'.$card['id_tarjeta']); ?>">Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="<?= site_url('gestionar_usuarios'); ?>">Volver a gestionar usuarios</a>
</body>
</html>
