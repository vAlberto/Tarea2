<!doctype html>
<html lang="es_ES">
    <head>
        <!-- Codificación de carácteres -->
        <meta charset="UTF-8">

        <!-- Título de la página -->
        <title>DWES4 - Tarea - Alberto Izquierdo Fermosel 70059741Q</title>

        <!-- LINK a la hoja de estilos -->
        <link rel="stylesheet" href="estilos.css"/>

    </head>

    <body>
        <?php
        /*
         *  Usamos la función para iniciar sesión de navegación
         */
        session_start();

        /*
         * Creamos la variable para mostar los mensajes.
         */
        
        $html_span_mensajes = '';

        /*
         * Comprobamos si el formulario ya ha enviado datos al servidor. En caso
         * afirmativo se guardan los datos recibidos en la sesión.
         */
        if (isset($_POST['idioma']) && isset($_POST['tipo_perfil']) &&
                isset($_POST['zona_horaria'])) {
            /*
             * Si el formulario ha sido cumplimentado cargamos los valores y mostramos
             * mensaje de que se han encontrado preferencias de usuario.
             */
            $_SESSION['pref_idioma'] = $_POST['idioma'];
            $_SESSION['pref_tipo_perfil'] = $_POST['tipo_perfil'];
            $_SESSION['pref_zona_horaria'] = $_POST['zona_horaria'];
            
            $html_span_mensajes = 'Información de sesión guardada.';
            
            $html_idioma = "<option disabled hidden>Seleccionar idioma...</option>";
            $html_tipo_perfil = "<option disabled hidden>Seleccionar tipo perfil...</option>";
            $html_zona_horaria = "<option disabled hidden>Seleccionar zona horaria...</option>";
            
            foreach($idioma as $valor){
                if($_SESSION['pref_idioma'] == $valor){
                    $html_idioma .= "\n<option value=\"$valor\" selected>$valor</option>";
                } else {
                    $html_idioma .= "\n<option value=\"$valor\">$valor</option>";
                }

            }
            foreach($tipo_perfil as $valor){
                if($_SESSION['pref_tipo_perfil'] == $valor){
                    $html_tipo_perfil .= "\n<option value=\"$valor\" selected>$valor</option>";
                } else {
                    $html_tipo_perfil .= "\n<option value=\"$valor\">$valor</option>";
                }

            }
            foreach($zona_horaria as $valor){
                if($_SESSION['pref_zona_horaria'] == $valor){
                    $html_zona_horaria .= "\n<option value=\"$valor\" selected>$valor</option>";
                } else {
                    $html_zona_horaria .= "\n<option value=\"$valor\">$valor</option>";
                }
            }
            } else {
            /*
             * Si el formulario aún no ha sido cumplimentado reseteamos los valores
             * y advertimos de que no existen preferencias.
             */
            $_SESSION['pref_idioma'] = "";
            $_SESSION['pref_tipo_perfil'] = "";
            $_SESSION['pref_zona_horaria'] = "";
            
            $html_span_mensajes = 'No hay preferencias guardadas.';
            
            $html_idioma = "<option disabled selected hidden>Seleccionar idioma...</option>";
            $html_tipo_perfil = "<option disabled selected hidden>Seleccionar tipo perfil...</option>";
            $html_zona_horaria = "<option disabled selected hidden>Seleccionar zona horaria...</option>";
            
            foreach($idioma as $valor){
                if($_SESSION['pref_idioma'] == $valor){
                    $html_idioma .= "\n<option value=\"$valor\" selected>$valor</option>";
                } else {
                    $html_idioma .= "\n<option value=\"$valor\">$valor</option>";
                }

            }
            foreach($tipo_perfil as $valor){
                if($_SESSION['pref_tipo_perfil'] == $valor){
                    $html_tipo_perfil .= "\n<option value=\"$valor\" selected>$valor</option>";
                } else {
                    $html_tipo_perfil .= "\n<option value=\"$valor\">$valor</option>";
                }

            }
            foreach($zona_horaria as $valor){
                if($_SESSION['pref_zona_horaria'] == $valor){
                    $html_zona_horaria .= "\n<option value=\"$valor\" selected>$valor</option>";
                } else {
                    $html_zona_horaria .= "\n<option value=\"$valor\">$valor</option>";
                }
            }
        }
?>
        <form id="preferencias" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">

            <fieldset>

                <legend>Preferencias</legend>

                <span id="html_span_mensajes" class="mensaje">
                    <?php echo $html_span_mensajes; ?>
                </span>

                <div class="campo">
                    <label class="etiqueta">Idioma:</label><br>
                    <select name="idioma">
                        <?php echo $html_idioma; ?>
                    </select>
                </div>

                <div class="campo">
                    <label class="etiqueta">Perfil público:</label><br>
                    <select name="tipo_perfil">
                        <?php echo $html_tipo_perfil; ?>                        
                    </select>
                </div>

                <div class="campo">
                    <label class="etiqueta">Zona Horaria:</label><br>
                    <select name="zona_horaria">
                        <?php echo $html_zona_horaria; ?>
                    </select>
                </div>

                <div class="separacionBotones">
                    <input style="display:block" type="submit"
                           value="Establecer preferencias" name="recoger_datos">
                    <a href="mostrar.php">Mostrar preferencias</a>
                </div>

            </fieldset>

        </form>
        
    </body>
</html>