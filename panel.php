<?php 
include 'Configuracion.php';
session_start();
$sw = false;
if(isset($_GET['err']))
{
    if($_GET['err'] == "1")
    {
        $sesion = "Error de usuario";
    }
    
}
else 
{
    
    if(isset($_SESSION['usuario']))
    {
        $sesion = $_SESSION['usuario'];
        $sw = true;
        if(($sesion == null || $sesion == '') && !validar_user_y_pass())
        {
            echo "No existe sesion actual";
            die();
        }
        
    }
    else
    {
        $sesion = "X";
    }
        
}


?>
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
                    <h1>Carro de compras</h1> 
                </div>
            </div>
            <div class="row bg-dark text-white">
                <div class="col-sm-12  bg-dark text-white">
                    <h2>
                        Bienvenido <?php echo $sesion;?> 
                        <a href="cerrarsesion.php" class="btn btn-outline-light pull-right">Cerrar sesion</a>    
                    </h2>
                </div>
            </div>
            
            <div class="row bg-dark text-white">
                <div class="col-sm-12  bg-dark text-white">&nbsp; </div>
            </div>
            <div class="row bg-dark text-white">
                <div class="col-sm-12  bg-dark text-white">&nbsp; </div>
            </div>
        </div>
        <?php 
        if ($sw) 
        {
        ?>    
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading"> 

                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="index.php">Inicio</a></li>
                        <li role="presentation"><a href="VerCarta.php">Ver carro de compras</a></li>
                        
                    </ul>
                </div>

                <div class="panel-body">
                    <h1>Mis Productos</h1>
                    <br>
                    <br>
                    <a href="VerCarta.php" class="cart-link" title="Ver Carta"><i class="glyphicon glyphicon-shopping-cart pull-left"></i></a>
                    <br>
                    <br>
                    <br>

                    <div id="products" class="row list-group">
                        <?php
                        //get rows query
                        $query = $db->query("SELECT * FROM mis_productos ORDER BY id DESC LIMIT 10");
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){
                        ?>
                        <div class="item col-lg-4">
                            <div class="row">
                                        <div class="col-md-12">
                                           
                                        </div>
                            </div>
                        </div>
                        <div class="item col-lg-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h4 class="list-group-item-heading"><?php echo $row["name"]; ?></h4>
                                    <p class="list-group-item-text"><?php echo $row["description"]; ?></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="lead"><?php echo '$'.$row["price"].' Pesos'; ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-success" href="AccionCarta.php?action=addToCart&id=<?php echo $row["id"]; ?>">Agregar al carro</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } }else{ ?>
                        <p>Producto(s) no existe.....</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="panel-footer">Tarea semana 6</div>
            </div><!--Panek cierra-->
        </div>
        <?php 
        }
        ?>    
    </body>
</html>


