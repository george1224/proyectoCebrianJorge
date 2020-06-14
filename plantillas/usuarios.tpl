<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>
          <link rel="stylesheet" href="./style.css">
        <!--<style>
            html{
                min-height: 100%;
            }
            body{
                background-image: url("./imagenFondo/espacio.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                align-items: center;
            }
            fieldset {
                width: 350px;
                margin-left: 38%;
                background-color: white;
            }
            fieldset span{
                color:#120EF4;
            }
            fieldset legend{
                color:#F40E15;
            }
            input{
                margin:8px 0;
                display:inline-block;
            }
            form input[type="submit"]{
                display:inline-block;
            }
            span {
                color: white;
            }
        </style>-->
    </head>
    <body>
        <center><h1>"El Fraseador"</h1></center>
        {if $msjInfo !== null}
            <span>{$msjInfo}</span>
        {/if}
        <fieldset id="fieldUser">           
            <legend>Crear usuario</legend>
            <form id="formUser" action="usuarios.php" method="POST">
                <span>Nombre:</span> <input type="text" name="nombre" placeholder="Introduzca datos..."/><br/>
                <span>Contraseña:</span> <input type="text" name="pass" placeholder="Introduzca datos..."/><br/>
                <span>Nombre del tutor/a:</span> <input type="text" name="nombreTutor" placeholder="Introduzca datos..."/><br/>
                <span>Dirección:</span> <input type="text" name="direccion" placeholder="Introduzca datos..."/><br/>
                <span>Teléfono:</span> <input type="text" name="telef" placeholder="Introduzca datos..."/><br/>
                <span>Email:</span> <input type="text" name="email" placeholder="Introduzca datos..."/><br/>
                <span>Tipo de discapacidad:</span> <input type="text" name="tipoDiscapacidad" placeholder="Introduzca datos..."/><br/>
                <span>Grado de discapacidad:</span> <input type="text" name="gradoDiscapacidad" placeholder="Introduzca datos..."/><br/>
                <input class="userCreated" type="submit" name="userCreado" value="Crear usuario" /> 
            </form>                
            <form action="index.php" method="POST">
                <input class="volver" type="submit" name="volver" value="Volver" />
            </form>
        </fieldset>

    </body>
</html>