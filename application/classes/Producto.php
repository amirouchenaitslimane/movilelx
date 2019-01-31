<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 20/12/2018
 * Time: 12:00
 */

namespace app;


class Producto
{

    private $id;
    private $nombre;
    private $descripcion;
    private  $precio;
    private $active;
    private $es_oferta;
    private $precio_reducido;
    private $categoria_id;
    private $created_at;
    private $updated_at;
    private $tipo_oferta;
    private $imagen = 'no_image.jpg';
    private static $ESTADO_ACTIVO = 1;
    private static $ESTADO_INACTIVO = 0;
    private $caracteristicas = [];

    private static $SALE_TRUE = 1;
    private static $SALE_FALSE = 0;

    private static $TIPO_NO_OFERTA= 0;
    private static $TIPO_REBAJA = 1;
    private static $TIPO_PROMOCION = 2;



    //clave
    const PREFIX_IMAGE = 'comprar-movilex-';
    const DIR_UPLOADS = "../application/uploads/products/";
    const MAX_IMG_SIZE = 500000;
    private $errors;

    use Hydrator;
    public function __construct(array $data = [])
    {
        if(!empty($data)){
            $this->hydrate($data);
        }

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getNombre()
    {

        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        //required;
        if($nombre === ""){
            $this->errors[]= "Nombre del producto es requirido";
        }
        $this->nombre = (string)$nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {

        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        if (empty(trim($precio)) || !preg_match("/^\d+(\.\d{2})?$/",trim($precio))){

            $this->errors[] = "Introduce el precio del producto con valores numericos";
        }
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $active = (int)$active;
        if(empty($active)){
            $this->active = 1;
        }
        if($active == 0 || $active == 1){
             $this->active = $active;
        }else{
            $this->errors[] = "elige el estado del producto activo (publico) o inctivo(oculto)";

        }

    }

    /**
     * @return mixed
     */
    public function getEsOferta()
    {
        return $this->es_oferta;
    }

    /**
     * @param mixed $es_oferta
     */
    public function setEs_oferta($es_oferta)
    {
        $this->es_oferta = $es_oferta;
    }

    /**
     * @return mixed
     */
    public function getPrecioReducido()
    {
        return $this->precio_reducido;
    }

    /**
     * @param mixed $precio_reducido
     */
    public function setPrecio_reducido($precio_reducido)
    {
        $this->precio_reducido = $precio_reducido;
    }




    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoria_id($categoria_id)
    {

        $this->categoria_id = (int) $categoria_id;
    }

    /**
     * @return mixed
     */
    public function getCreated_at()
    {
        return (new \DateTime($this->created_at))->format('d-m-Y');

    }

    /**
     * @param mixed $created_at
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     */
    public function addErrors($errors)
    {
        $this->errors[] = $errors;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        if(empty($imagen)){
            $this->imagen = 'no_image.jpg';
        }else{
            $this->imagen =$imagen;
        }

    }

    public function getEstadoOption()
    {
        return [self::$ESTADO_ACTIVO =>"Activo",self::$ESTADO_INACTIVO=>"Inactivo"];

    }

    /**
     * @return array
     */
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    /**
     * @param array $caracteristicas
     */
    public function setCaracteristicas(array $caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;
    }

    public static function estado()
    {
        return [self::$ESTADO_ACTIVO =>"Activo",self::$ESTADO_INACTIVO=>"Inactivo"];


    }

    public function esOferta()
    {
        return[
            self::$SALE_TRUE => 'Si',
            self::$SALE_FALSE =>'No'
        ];

    }

    public function tipoOfertaOpcion()
    {
        return [
          self::$TIPO_NO_OFERTA = 'Sin oferta',
          self::$TIPO_REBAJA =>'Rebaja',
          self::$TIPO_PROMOCION =>'Promcion'
        ];

    }

    public function delete($file) {

        if(file_exists('../uploads/products/'.$file)){
            unlink('../uploads/products/'.$file) ;
        }else{
            $this->errors[] = "Imagen no existe";
        }
    }

    /**
     * @return mixed
     */
    public function getTipo_oferta()
    {
        return $this->tipo_oferta;
    }

    /**
     * @param mixed $tipo_oferta
     */
    public function setTipo_oferta($tipo_oferta)
    {
        $this->tipo_oferta = $tipo_oferta;
    }


    public function uploadImage($name)
    {
        $filename = $_FILES[$name]['name'];
        $file_basename = substr($filename, 0, strripos($filename, '.'));

        $file_ext = substr($filename, strripos($filename, '.'));
        $filesize = $_FILES[$name]["size"];
        $allowed_file_types = array('.jpg' , '.jpeg' , '.gif' , '.png');
        if(!empty($file_basename)) {
            if($filesize < 200000) {
                if (in_array($file_ext, $allowed_file_types)) {
                    $newfilename = md5($file_basename) . $file_ext;

                    if (file_exists('../uploads/products/' . $newfilename) || $this->imagen == $newfilename) {
                        $this->errors[] = "La imagen siempre existe en la base de datos";
                    } else {

                        if(move_uploaded_file($_FILES[$name]["tmp_name"], '../uploads/products/' . $newfilename)){
                            $this->setImagen($newfilename);
                            return true;
                        }

                    }

                } else {
                    $this->errors[] = "fichero seleccionado no es imagen siempre :" . implode(', ', $allowed_file_types);;
                    unlink($_FILES[$name]["tmp_name"]);
                }
            }else{
                $this->errors[] = 'La imagen selleccionada es demasiada grande ';

            }
        }

return false;
    }

}