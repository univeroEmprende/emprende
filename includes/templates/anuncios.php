<?php 
    $db = conectarDB();


    // consultar
    $query = "SELECT * FROM productos";

    // obtener resultado
    $resultado = mysqli_query($db, $query);


?>

<div class="contenedor-anuncios">
        <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">

            <img loading="lazy" src="/imagenes/<?php echo $producto['imagen']; ?>" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo $producto['nombre']; ?></h3>
                <p><?php echo $producto['descripcion']; ?></p>
                <p class="precio">$<?php echo $producto['precio']; ?></p>


                <a href="anuncio.php?id=<?php echo $producto['id']; ?>" class="boton-amarillo-block">
                    Ver Propiedad
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
        <?php endwhile; ?>
    </div> <!--.contenedor-anuncios-->

<?php 

    // Cerrar la conexión
    mysqli_close($db);
?>