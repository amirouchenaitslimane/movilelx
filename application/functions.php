<?php
function redirect($page)
{
    echo "<script>location.href='".$page.".php'</script>";
}


//define function name
function agregarLog($arMsg,$path='application/logs/')
{
    //define empty string
    $stEntry="";
    //get the event occur date time,when it will happened
    $arLogData['event_datetime']='['.date('D Y-m-d h:i:s A').'] [client '.$_SERVER['REMOTE_ADDR'].']';
    //if message is array type
    if(is_array($arMsg))
    {
        //concatenate msg with datetime
        foreach($arMsg as $msg)
            $stEntry.=$arLogData['event_datetime']." ".$msg."\n";
    }
    else
    {   //concatenate msg with datetime

        $stEntry.=$arLogData['event_datetime']." ".$arMsg;
    }

//create file with current date name
    $stCurLogFileName='log_'.date('Ymd').'.txt';
//open the file append mode,dats the log file will create day wise


    $fHandler=fopen($path.$stCurLogFileName,'a+');


    //write the info into the file
    fwrite($fHandler,$stEntry);

//close handler
    fclose($fHandler);
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
function reduceText($string, $nb_car, $delim='...') {
  $length = $nb_car;
  if($nb_car<strlen($string)){
    while (($string{$length} != " ") && ($length > 0)) {
      $length--;
    }
    if ($length == 0) return substr($string, 0, $nb_car) . $delim;
    else return substr($string, 0, $length) . $delim;
  }else return $string;
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