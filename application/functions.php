<?php
function redidect($page)
{
    echo "<script>location.href='".$page.".php'</script>";
}
function DEBUG($mixed){
    echo "<pre>";
    var_dump($mixed);
    echo "</pre>";
}


function displayError(array  $errors){
    $string = "";
    if(count($errors) > 0){
        $string .= "<ul class='alert alert-danger'>";
        foreach ($errors as $error)
        {
            $string .= "<li class='pt-2'>".$error."</li>";
        }

        $string .="</ul>";
    }
    return $string;

}

function flash( $name = '', $message = '', $class = 'alert alert-danger' )
{

    if( !empty( $name ) )
    {

        if( !empty( $message ) && empty( $_SESSION[$name] ) )
        {
            if( !empty( $_SESSION[$name] ) )
            {
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) )
            {
                unset( $_SESSION[$name.'_class'] );
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }

        elseif( !empty( $_SESSION[$name] )&& empty( $message ) )
        {
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="'.$class.'" id="msg-flash"><p class="p-3">'.$_SESSION[$name].'</p></div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}
