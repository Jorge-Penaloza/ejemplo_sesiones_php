<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Tarea semana 6</title>
</head>
    <body>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/funciones.js"></script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12  bg-dark text-white text-center">
                    <h1>Login</h1> 
                </div>
            </div>
            <div class="row bg-dark text-white">
                <div class="col-sm-12  bg-dark text-white">&nbsp; </div>
            </div>
            <div class="row">
                <div class="col-sm-0 col-md-1 col-xl-1  bg-dark text-white">

                </div>
                <div class="col-sm-12 col-md-10 col-xl-10  bg-dark text-center">
                    <form action="validar.php" method="post">
                        
                            <img src="img/admin-icon.png" alt="Avatar" class="avatar">
                            <label for="usuario" class="text-white"><b>Usuario</b></label>
                            <input type="text" placeholder="Ingrese nombre de usuario" name="usuario" required>

                            <label for="psw" class="text-white"><b>Contraseña</b></label>
                            <input type="password" placeholder="Ingrese contraseña" name="psw" required>

                            <button type="submit" class="btn-outline-secondary">Iniciar sesion</button>
                    </form>
                    </div>
                <div class="col-sm-0 col-md-1 col-xl-1  bg-dark text-white"></div>
            </div>
            <div class="row bg-dark text-white">
                <div class="col-sm-12  bg-dark text-white">&nbsp; </div>
            </div>
            <div class="row bg-dark text-white">
                <div class="col-sm-12  bg-dark text-white">&nbsp; </div>
            </div>
            <div class="row bg-dark text-white">
                <div class="col-sm-12  bg-dark text-white">&nbsp; </div>
            </div>
        </div>
    </body>
</html>