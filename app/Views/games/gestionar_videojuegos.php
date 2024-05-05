<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Videojuegos - G4A</title>
    <link rel="stylesheet" href="<?= base_url('estilos.css'); ?>">
</head>
<body style="background-color: #4CC5B0; text-align: center; color: #000000;">
    <div id="header">
        <h1>GAMES4ALL</h1>
        <h4>¡Consigue tu juego preferido al mejor precio!</h4>
    </div>

    <div style="float: left; width: 20%; height: 350px; margin-top: -25px; background-color: #173E59; color: #ffffff; font-size: 25px;">
        <p>Panel de Administración</p>

        <a href="<?= site_url('games/list'); ?>" style="display: block; margin: 10px; padding: 10px; background-color: #4CAF50; color: white; border-radius: 5px; text-decoration: none;">Listar Juegos</a>
        <a href="<?= site_url('games/add'); ?>" style="display: block; margin: 10px; padding: 10px; background-color: #4CAF50; color: white; border-radius: 5px; text-decoration: none;">Añadir Juego</a>
        <a href="<?= site_url('games/modify'); ?>" style="display: block; margin: 10px; padding: 10px; background-color: #4CAF50; color: white; border-radius: 5px; text-decoration: none;">Modificar o Eliminar Juegos</a>
        <a href="<?= site_url('menu'); ?>" style="display: block; margin: 10px; padding: 10px; background-color: #4CAF50; color: white; border-radius: 5px; text-decoration: none;">Volver al Menú Principal</a>
    </div>
</body>
</html>
