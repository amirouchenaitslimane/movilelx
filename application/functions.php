<?php
function redirect($page)
{
    echo "<script>location.href='".$page.".php'</script>";
}
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{

    if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;

    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;

    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
    if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;

    return move_uploaded_file($_FILES[$index]['tmp_name'],$destination.$_FILES[$index]['name']);
}


function porcentaje($price_init,$reduc){




    $value = $price_init - $reduc;
    $porcentaje = ($value * 100)/$price_init;
    return number_format($porcentaje, 1, ',', ' ').'%';
}
function arrayHelperCaracteristicas($array)
{
    $fields = [];
    $label = $array['label'];

    $valor = $array['valor'];
    for ($i = 0; $i < count($label); $i++) {
        if (!empty($label[$i])  && $valor !== "") {
            $tmp_array = [];
            $tmp_array['label'] =  htmlspecialchars(trim($label[$i]));
            $tmp_array['valor'] =  htmlspecialchars(trim($valor[$i]));
            $fields[] = $tmp_array;

        }
    }

    return $fields;
}

function DEBUG($mixed){
    echo "<pre>";
    var_dump($mixed);
    echo "</pre>";
}

function dateFormatter($date){
    return (new \DateTime($date))->format('d-m-Y');
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
            echo '<div class="alert alert-'.$class.'" id="msg-flash"><p class="p-3">'.$_SESSION[$name].'</p></div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}

function redirectWithParam($page,$params){

    echo "<script>location.href='".$page.".php?".$params."'</script>";

}

function precioES($str){
  $price = str_replace('.',',',$str);
  return $price;
}