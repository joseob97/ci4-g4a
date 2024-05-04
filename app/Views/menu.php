<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>G4A</title>
    <link rel="stylesheet" href="<?= base_url('css/estilos.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        #cart-icon {
            position: absolute;
            top: 460px;
            left: 160px;
        }
        #search-icon {
            position: absolute;
            top: 460px;
            left: 130px;
        }
    </style>
        <div id="header">
        <h1>GAMES4ALL</h1>
        <h4>¡Consigue tu juego preferido al mejor precio!</h4>
        <?php if ($roles !== 'administrador') { ?>
        <div id="cart-icon">
            <a href="<?= site_url('ver_carrito.php'); ?>"><i class="fa-solid fa-cart-shopping fa-lg" style="color: #63E6BE;"></i></a>
        </div>
        <?php } ?>

        <div id="search-icon">
            <a href="(<?= site_url('buscar_juegos.php'); ?>"><i class="fa-solid fa-magnifying-glass" style="color: #63E6BE;"></i></a>
        </div>
    </div>
    </head>
    
    <body style="background-color: #4CC5B0; text-align: center; color: #000000;">
        <div style="float: left; width: 20%; height: 350px;margin-top: -25px; background-color: #173E59; color: #ffffff;font-size: 25px;">

    <?php   if ($rol == "administrador"){
                echo "Panel del $rol:<br> $alias";    //PANEL DEL ADMINISTRADOR
    ?>          
                <form method="post" action="gestionar_perfil.php">
                    <input type="submit" value="Mostrar perfil">
                </form>

                <form method="post" action="gestionar_usuarios.php">
                    <input type="submit" value="Gestionar usuarios">
                </form>
        
                <form method="post" action="gestionar_videojuegos.php">
                    <input type="submit" value="Gestionar videojuegos">
                </form>
                 
                <form method="post" action="gestionar_pedidos.php">
                    <input type="submit" value="Gestionar pedidos">
                </form>
                
                <form method="post" action="gestionar_descuentos.php">
                    <input type="submit" value="Gestionar descuentos">
                </form>
                
                <form method="post" action="<?= site_url('index'); ?>">
                    <input type="hidden" name="logout" value="true">
                    <input type="submit" value="Cerrar sesión">
                </form>
                 
    <?php
            }
            else{
                echo "Panel de $rol<br>Has iniciado sesión como:<br>$alias";    //PANEL DEL USUARIO
    ?>          
                <form method="post" action="consultar_pedidos.php">
                    <input type="submit" value="Gestionar pedidos">
                </form>

                <form method="post" action="biblioteca.php">
                    <input type="submit" value="Mi biblioteca de juegos">
                </form>                

                <form method="post" action="consultar_descuentos.php">
                    <input type="submit" value="Mis descuentos">
                </form>

                <form method="post" action="gestionar_perfil.php">
                    <input type="submit" value="Mostrar perfil">
                </form>

                <form method="post" action="gestionar_tarjetas.php">
                    <input type="submit" value="Gestionar tarjetas">
                </form>

                <form method="post" action="<?= site_url('index'); ?>">
                    <input type="hidden" name="logout" value="true">
                    <input type="submit" value="Cerrar sesión">
                </form>
                
   
        <?php
            }
        ?>
            </div>
    </body>
</html>