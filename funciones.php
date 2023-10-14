<?php 
/*Traer los datos recibidos por HTTP POST y retorno el HASH
MD5 de ambos*/
function get_post_data() 
{
    $hash = "";
    if(isset($_POST['usuario']) &&isset($_POST['psw'])) 
    {
        $hash = md5($_POST['usuario'].$_POST['psw']);
        return $hash;
    }
}
/*Comparar ambos hashes. Si son idénticos, retorno Verdadero*/
function validar_user_y_pass() 
{
    $user_hash = get_post_data();
    $system_hash = HASH_ACCESO;
    if($user_hash == $system_hash) 
    {

        return True;
    }
    return false;
}



# Destruir sesión
function logout() 
{
    unset($_SESSION);
    $datos_cookie = session_get_cookie_params();
    setcookie( session_name(), NULL, time()-999999, 
        $datos_cookie["path"],
        $datos_cookie["domain"], 
        $datos_cookie["secure"],
        $datos_cookie["httponly"]);
    header("Location:".PAGINA_LOGIN);
}

/*Primero verificar que la variable de sesión login_date,
e xiste. De ser así, obtener su valor y lo retornarlo. Si no
e xiste, retornará el entero 0*/
function obtener_ultimo_acceso() 
{
    $ultimo_acceso = 0;
    if(isset($_SESSION['login_date'])) 
    {
        $ultimo_acceso = $_SESSION['login_date'];
    }
    return $ultimo_acceso;
}

/*
Esta función, retornará el estado de la sesión: sesión
inactiva, retornará False mientras que sesión esta activa,
retornará True. Al mismo tiempo, s e encarga de actualizar la
variable de sesión
login_date, cuando la sesión se encuentre activa*/
function sesion_activa() 
{
    $estado_activo = False;
    $ultimo_acceso = obtener_ultimo_acceso();
    /*Establecer como límite máximo de inactividad, para mantener
    la sesión activa, m edia hora (o sea, 1800 segundos). De esta
    manera, sumando 1800 segundos a login_date, se de finiendo
    cual es la marca de tiempo más alta, que puedo per mitir al
    usuario para mantener la sesión activa. */
    $limite_ultimo_acceso = $ultimo_acceso + 1800;
    /*Rea
    lizar la comparación. Si el último acceso del usuario
    hace más de media hora de gracia que se le otorga para
    mantenerle activa la sesión, es mayor a l a marca de hora
    actual, significa entonces que su sesión puede seguir activa.
    Entonces, actualizar la marc a de tiempo, renovándole la
    sesión*/
    if($limite_ultimo_acceso > time()) 
    {
        $estado_activo = True;
        # actualizar la marca de tiempo renovando la sesión
        $_SESSION['login_date'] = time();
    }
    return $estado_activo;
}

# Verificar sesión
function validar_sesion() 
{
    if(!sesion_activa()) 
    {
        logout();
    }
}
?>