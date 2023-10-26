<?php
  if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arte Glass</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    
    <header class="header">
        <?php if($auth): ?>
            <a href="cerrar-sesion.php">Cerrar Sesión</a>
            
        <?php endif; ?> 
        <div class="derecha">
            <img class="dark-mode-boton" src="/build/img/menu-mobile.svg" alt="boton dark-mode">
            <a href="/">
                <img src="/build/img/logo.png" alt="Logotipo Universo Emprende">
            </a>
        </div> 
    </header>

    <div class="mobile-menu">
        <img src="/build/img/menu-mobile.svg" alt="icono menu responsive">
    </div>
    <div class="nav-bg">
        <div></div>
        <nav class="navegacion">
            <a href="nosotros.php">Contabilidad</a>
            <a href="anuncios.php">Marketing Digital</a>
            <a href="Diseño Gráfico.php">Diseño Gráfico</a>
            <a href="fotografia.php">Fotografía</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div>