<?php 
    
    debuguear("hoal");

    require '../../includes/app.php';
    
    use App\Producto;

    $producto = new Producto;
    
    estaAutenticado();

    // Base de datos
    $db = conectarDB();


    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM categorias";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    $nombre = '';
    $precio = '';
    $descripcion = '';
    $categoria_id = '';

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

       
        $nombre = mysqli_real_escape_string( $db,  $_POST['nombre'] );
        $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
        $categoria_id = mysqli_real_escape_string( $db,  $_POST['categoria_id'] );

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

        if(!$imagen['name']) {
            $errores[] = 'La Imagen es Obligatoria';
        }

        // Validar por tamaño (1mb máximo)
        $medida = 1000 * 1000;


        if($imagen['size'] > $medida ) {
            $errores[] = 'La Imagen es muy pesada';
        }

        // Revisar que el array de errores este vacio
        if(empty($errores)) {

            /** SUBIDA DE ARCHIVOS */

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";


            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
 
            // Insertar en la base de datos
            $query = " INSERT INTO productos (nombre, precio, descripcion, imagen, categoria_id) VALUES ( '$nombre', '$precio', '$descripcion', '$nombreImagen', '$categoria_id') ";
                
            // echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=1');
            }
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre Producto" value="<?php echo $nombre; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Producto" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Categoría</legend>

                <select name="categoria_id">
                    <option value="">-- Seleccione --</option>
                    <?php while($categoria =  mysqli_fetch_assoc($resultado) ) : ?>
                        <option  <?php echo $categoria_id === $categoria['id'] ? 'selected' : ''; ?>   value="<?php echo $categoria['id']; ?>"> <?php echo $categoria['nombre']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplate('footer');
?> 