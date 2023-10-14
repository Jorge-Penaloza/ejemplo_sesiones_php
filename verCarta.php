<?php 
include 'La-carta.php';
$cart = new Cart;
//session_start();
$sw = false;
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
                        Benvenido <?php echo $sesion;?> 
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

                    <ul class="nav nav-pills ">
                        <li role="presentation" ><a href="panel.php">Inicio</a></li>
                        <li role="presentation" class="active"><a href="VerCarta.php">Ver carro de compras</a></li>
                    
                    </ul>
                </div>

                <div class="panel-body">


                    <h1>Carrito de compras</h1>
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($cart->total_items() > 0){
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach($cartItems as $item){
                        ?>
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo '$'.$item["price"].' pesos'; ?></td>
                            <td>
                                <input type="number" class="form-control text-center" 
                                        value="<?php echo $item["qty"]; ?>" 
                                        onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')">
                            </td>
                            <td><?php echo '$'.$item["subtotal"].' pesos'; ?></td>
                            <td>
                                <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-warning" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                        <?php } }else{ ?>
                        <tr><td colspan="5"><p>Tu carta esta vacia.....</p></td>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="panel.php" class="btn btn-success"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a></td>
                            <td colspan="2"></td>
                            <?php if($cart->total_items() > 0){ ?>
                            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' pesos'; ?></strong></td>
                            <td><a href="#" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                    </table>
                    
                </div>
            <div class="panel-footer">Tarea semana 6</div>
            </div><!--Panek cierra-->
            
        </div>
        <?php 
        }
        ?>    
    </body>
</html>
