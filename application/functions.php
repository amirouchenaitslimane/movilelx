<?php
function redidect($page)
{
    echo "<script>location.href='".$page.".php'</script>";
}
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
    //Test1: fichier correctement uploadé
    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
    //Test2: taille limite
    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
    //Test3: extension
    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
    //Déplacement
    return move_uploaded_file($_FILES[$index]['tmp_name'],$destination.$_FILES[$index]['name']);
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
