<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>  
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div>
            <center><h1>Bienvenidos a "El Fraseador"</h1></center>
            <hr />
            {if $errorInicioSesion !== null}
                <span>{$errorInicioSesion}</span>
            {elseif $msjInfo !== null}
                <span>{$msjInfo}</span>
            {/if}
            <form action="index.php" method="POST">
                <fieldset id="fieldIndex">
                    <legend>Login</legend>
                    <span>Usuario:</span> <input type="text" name="name" placeholder="Introduzca datos..."/><br/>
                    <span>Contraseña:</span> <input type="text" name="pass" placeholder="Introduzca datos..."/><br/>
                    <input type="submit" name="login" value="Iniciar sesion" />       
                    &nbsp;&nbsp;<input type="submit" name="create" value="Crear usuario" />
                </fieldset>
            </form>
            <!--<h3>$mi_error}</h3>-->
        </div>
    </body>
</html>