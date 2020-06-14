<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>      
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        {if $alumno !== null}
        <span>Usuario: {$usuarioProfesor->getNombreUsuario()} ha entrado en la cuenta del usuario: {$alumno->getNombreUsuario()} </span>
    {else if $usuarioBD !== null}
        <span>Bienvenido usuario: {$usuarioBD->getNombreUsuario()}</span>
    {else}
        <span>Bienvenido usuario: {$usuarioProfesor->getNombreUsuario()}</span>
    {/if}
    <hr />
    {if $msj !== null}
        <span>{$msj}</span>     
    {/if}
    <form id="frasesPHP" action="frases.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoFrase" placeholder="Escriba aquí"></textarea><br/>
            {if $alumno !== null}
                <input type="hidden" name="alumno" value="{$alumno->getNombreUsuario()}"/>
                <input type="hidden" name="profesor" value="{$usuarioProfesor->getNombreUsuario()}"/>
            {else if $usuarioBD !== null}
                <input type="hidden" name="usuario" value="{$usuarioBD->getNombreUsuario()}"/>
            {else}
                <input type="hidden" name="profesor" value="{$usuarioProfesor->getNombreUsuario()}"/>
            {/if}
            <input type="submit" name="submitFrases" value="Borrar" />
            <input type="submit" name="submitFrases" value="Modificar"/>
        </center>
        <hr />
        <br />
        <span id="msgResultado">Listado de Frases Favoritas: </span><br />
        {if $frasesUser !== null}
            {foreach $frasesUser as $datosArray => $contenido}
                <div>
                    <p><input type="checkbox" name="frasesLista[]" value="{$contenido->getFraseUsuario()}"> {ucfirst($contenido->getFraseUsuario())}</p><br/>
                        {foreach $contenido->getPalabrasFrases() as $numFrasesIndices => $contenidoFrases}
                        <img src="{$contenidoFrases}" alt="{$contenidoFrases}"/>
                    {/foreach}
                </div>
            {/foreach}
        {/if}        
    </form>
    <br />
    <form id="pictotraductorPHP" action="pictotraductor.php" method="POST">
        {if $alumno !== null}
            <input type="hidden" name="alumno" value="{$alumno->getNombreUsuario()}"/>
            <input type="hidden" name="profesor" value="{$usuarioProfesor->getNombreUsuario()}"/>
        {else if $usuarioBD !== null}
            <input type="hidden" name="usuario" value="{$usuarioBD->getNombreUsuario()}"/>
        {else}
            <input type="hidden" name="profesor" value="{$usuarioProfesor->getNombreUsuario()}"/>
        {/if}
        <input type="submit" name="submitVolver" value="Volver"/>
    </form>
</body>
</html>