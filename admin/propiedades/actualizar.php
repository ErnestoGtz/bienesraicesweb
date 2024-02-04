<?php
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);

    if(!$id){
      header('Location: /bienesraices2/admin');
    }
    //base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //obtener los datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id = ${id}";
    $resultado = mysqli_query($db,$consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    //consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db,$consulta);

    //Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorID = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    //Ejecutar el codigo despues de que el  usuario enviar el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorID = mysqli_real_escape_string($db, $_POST['vendedorID']);
        $creado = date('Y/m/d');

        //asignar files a una variable 
        $imagen = $_FILES['imagen'];
        

        if(!$titulo){
            $errores[] = "Debes añadir un titulo";
        }

        if(!$precio){
            $errores[] = "El Precio es obligatorio";
        }

        if(strlen($descripcion) < 20 ){
            $errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }

        if(!$habitaciones){
            $errores[] = "El numero de habitaciones es obligatorio";
        }

        if(!$wc){
            $errores[] = "El Numero de Baños es obligatorio";
        }
        
        if(!$vendedorID){
            $errores[] = "Elige un vendedor";
        }

        $medida = 1024 * 500;

        if($imagen['size'] > $medida ){
            $errores[] = 'La imagen es muy pesada';
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        //Revisar que arreglo de errores este vacio
        if(empty($errores)){
            /* SUBIDA DE ARCHIVOS */
            
            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';
            
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            if($imagen['name']){
              //Eliminar la imagen previa
              unlink($carpetaImagenes . $propiedad['imagen']);

              //Generar nombre unico para la imagen
              $nombreImagen = md5(uniqid( rand(),true )) . ".jpg";

              //Subir la imagen
              move_uploaded_file($imagen['tmp_name'],$carpetaImagenes . $nombreImagen);
            } else {
              $nombreImagen = $propiedad['imagen'];
            }
            
            //insertar en la base de datos 
                $query = "UPDATE propiedades SET titulo = '${titulo}',precio = ${precio},imagen = '${nombreImagen}', descripcion = '${descripcion}',
                          habitaciones = ${habitaciones},wc = ${wc},estacionamiento = ${estacionamiento},vendedores_id = ${vendedorID} WHERE id = ${id}";

                //echo $query;
                $resultado = mysqli_query($db,$query);

                if($resultado){
                    // Redireccionar al usuario
                    header('Location:/bienesraices2/admin?resultado=2');
                }
        }

        

    }

  require '../../includes/funciones.php';
  incluirTemplate('header');
?>
    <main class="contenedor">
      <h1>Actualizar Propiedad</h1>
      <a href="/bienesraices2/admin" class="boton boton-verde-inline">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
            
        <?php endforeach; ?>

      <form  class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>
            <label for="titulo">Titutlo</label>
            <input id="titulo" name="titulo" type="text" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">
            <label for="imagen">Imagen</label>
            <input id="imagen" type="file" accept="image/jpeg, image/png" name="imagen">
            <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">
            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion"> <?php echo $descripcion; ?> </textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion Propiedad</legend>
            <label for="habitaciones">Habitaciones</label>
            <input id="habitaciones" name="habitaciones" type="number" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
            <label for="wc">Baños</label>
            <input id="wc" name="wc" type="number" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc; ?>">
            <label for="estacionamiento">Estacionamiento</label>
            <input id="estacionamiento" name="estacionamiento" type="number" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedorID">
                <option value="">Selecciona Vendedor</option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                    <option <?php echo $vendedorID == $vendedor['id'] ? 'selected':''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde-inline">
      </form>
    </main>
<?php
    incluirTemplate('footer');
?>

