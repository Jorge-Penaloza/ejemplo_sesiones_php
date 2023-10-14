<?php 
include "settings.php";
include "funciones.php";
if(isset($_POST['usuario']) && isset($_POST['psw']))
{
    //session_start();
    
    if(get_post_data())
    {
        
        $user_valido = validar_user_y_pass();
        if($user_valido) 
        {
            session_start();
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['login_date'] = time();
            header("Location:".PAGINA_RESTRINGIDA_POR_DEFECTO);
        }
        else 
        {
            header("Location:".PAGINA_RESTRINGIDA_POR_DEFECTO."?err=1");
        }
    }
    else 
    {
        echo "que paos";
        session_destroy();
        die;
    }
    
}
else
{
    echo "Error de capa 8";
    $sesion = "";
}
?>