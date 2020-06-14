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
    {if $msjInfo !== null}
        <span>{$msjInfo}</span>
    {/if}
    <form id="pictoFrases" action="pictotraductor.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoTraducir" placeholder="Escriba aquí"></textarea>
            {if $alumno !== null}
                <input type="hidden" name="alumno" value="{$alumno->getNombreUsuario()}"/>
                <input type="hidden" name="profesor" value="{$usuarioProfesor->getNombreUsuario()}"/>
            {else if $usuarioBD !== null}
                <input type="hidden" name="usuario" value="{$usuarioBD->getNombreUsuario()}"/>
            {else}
                <input type="hidden" name="profesor" value="{$usuarioProfesor->getNombreUsuario()}"/>
            {/if}
            <input type="submit" name="submitPictotraductor" value="Traducir"/><br/>
            <input type="submit" name="submitPictotraductor" value="Añadir a Frases Favoritas" />
            <input type="submit" name="submitPictotraductor" value="Ir a Frases Favoritas" />   
            <input type="submit" name="submitPictotraductor" value="Volver" /></center>
    </form>
    <hr/>
    <span id="msgResultado">Resultado:</span>
    {if $pictogramas !== null}
        <p>{ucfirst($fraseUser)}</p>
        {foreach $pictogramas as $datosArray => $contenido}
            {if $contenido !== null}
                <img src="{$contenido}" alt="{$contenido}"/>
            {/if}
        {/foreach}
    {/if}
    <br />
</body>
</html>