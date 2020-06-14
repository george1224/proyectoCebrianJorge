<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>      
  <link rel="stylesheet" href="./style.css">
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        {if $usuarioProfesor !== null}
        <span>Bienvenido usuario: {$usuarioProfesor->getNombreUsuario()}</span>
    {/if}
    <hr />
    <center><table border=1>
            <tr><th colspan="3">Listado de alumnos del profesor: {$usuarioProfesor->getNombreUsuario()}</th></tr>
                    {foreach $usuarioProfesor->getListadoAlumnos() as $alumnos => $contenido}
                <tr>
                    <td>{$contenido['NombreUsuario']}</td>
                    <td>{$contenido['PassUsuario']}</td>
                    <td>
                        <form action="profesorSesion.php" method="POST">
                            <input type="hidden" name="alumnoName" value="{$contenido['NombreUsuario']}"/>
                            <input type="hidden" name="alumnoPass" value="{$contenido['PassUsuario']}"/>
                            <input type="submit" name="submitCuenta" value="Acceder a cuenta"/>
                        </form>
                    </td>
                </tr>
            {/foreach}
        </table></center>
    <form id="pictotraductorProfe" action="profesorSesion.php" method="POST">
        <input type="submit" name="submitPictotraductor" value="Cerrar sesion"/>
        <input type="submit" name="submitPictotraductor" value="Ir al Pictotraductor"/>
    </form>
</body>
</html>