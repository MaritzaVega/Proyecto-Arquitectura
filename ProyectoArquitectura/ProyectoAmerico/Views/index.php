<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
=======
<html lang="es">
>>>>>>> 2efd88ae5a9ace2566adc99baf40f1731fb450aa
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Bienvenido</title>
</head>
<body>
    <h1>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis provident consequuntur culpa impedit ab? Neque, molestias ab totam veniam deserunt officia error nobis quis sapiente dignissimos minus ratione ipsum architecto!</h1>
=======
    <title>Sistema VeI Americo-Login</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/style.css">
 
</head>

<body>

    <!---------------CABECERAS---------------->
    <div class="barraNav all-tittles"> <!--No se usa todavia la class--->
       <header class="cabeceraMy">
        <nav class="cabecera1">
            <h2>SISTEMA DE VENTA E INVENTARIO</h2>
        </nav>
        </header>
        <header class="cabeceraMn">
        <nav class="cabecera2">
            <h3>Inicio Session</h3>
        </nav>
        </header>
    </div>
    <!-------------------RecuadroLogin---------------->
    <br>
    <div class="contenedor-form">
        <div class="formLogin all-tittles">
            <img src="imagenes/logo.JPG">
            <form action="controlador/validarLogin.php" method="POST">
                <img class="iconologo" src="imagenes/usuario.png">
                <label>Usuario:</label> <input type="number" placeholder="Usuario" name="usuario" required>
                <br>
                <br>
                <img class="iconologo" src="imagenes/contraseña.png">
                <label>Contraseña:</label> <input type="password" placeholder="Contraseña" name="clave" required>
                <br>
                <br>
                <input type="submit" class="all-tittles" value="Ingresar">
             </form>
        </div>
        <!---Pie de Pagina!-->
    </div>
    <div class="piePagina all-tittles">
        <label>Lima, San Juan de Miraflores</label>             
    </div>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/mains.js"></script> 
>>>>>>> 2efd88ae5a9ace2566adc99baf40f1731fb450aa
</body>
</html>