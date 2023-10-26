<?php 

    require '../../includes/funciones.php';

    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    // Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Obtener los datos de la propiedad
    $consulta = "SELECT * FROM productos WHERE id = ${id}";
    $resultado = mysqli_query($db, $consulta);
    $producto = mysqli_fetch_assoc($resultado);


    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM categorias";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $nombre = $producto['nombre'];
    $precio = $producto['precio'];
    $descripcion = $producto['descripcion'];
    $categoria_id = $producto['categoria_id'];
    $imagenPropiedad = $producto['imagen'];



    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = mysqli_real_escape_string( $db,  $_POST['nombre'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $categoria_id = mysqli_real_escape_string( $db,  $_POST['categoria_id'] );
        $creado = date('Y/m/d');

        
        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$nombre) {
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio) {
            $errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $descripcion ) < 50 ) {
            $errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }
       
        if(!$categoria_id) {
            $errores[] = 'Elige una categoría';
        }

        // Validar por tamaño (1mb máximo)
        $medida = 1000 * 1000;
        if($imagen['size'] > $medida ) {
            $errores[] = 'La Imagen es muy pesada';
        }

        // Revisar que el array de errores este vacio

        if(empty($errores)) {

    

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            /** SUBIDA DE ARCHIVOS */

            if($imagen['name']) {
                // Eliminar la imagen previa

                unlink($carpetaImagenes . $producto['imagen']);

                // // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                // // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
            } else {
                $nombreImagen = $producto['imagen'];
            }

            // Insertar en la base de datos
            $query = " UPDATE productos SET nombre = '${nombre}', precio = ${precio}, imagen = '${nombreImagen}', descripcion = '${descripcion}', categoria_id = ${categoria_id} WHERE id = ${id} ";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=2');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre Producto" value="<?php echo $nombre; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="categoria_id">
                    <option value="">-- Seleccione --</option>
                    <?php while($categoria =  mysqli_fetch_assoc($resultado) ) : ?>
                        <option  <?php echo $categoria_id === $categoria['id'] ? 'selected' : ''; ?>   value="<?php echo $categoria['id']; ?>"> <?php echo $categoria['nombre']?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplate('footer');
?> 