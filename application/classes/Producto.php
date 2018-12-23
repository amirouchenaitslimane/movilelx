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
    private $categoria_id;
    private $created_at;
    private $updated_at;
    private $imagen;
    private static $ESTADO_ACTIVO = 1;
    private static $ESTADO_INACTIVO = 0;


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
        if(empty(trim($nombre))){
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
        if(empty(trim($precio)) ){
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
        if(empty($active)){
            $this->active = 1;
        }
        $this->active = $active;
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
        $this->imagen =$imagen;
    }

    public function getEstadoOption()
    {
        return [self::$ESTADO_ACTIVO =>"Activo",self::$ESTADO_INACTIVO=>"Inactivo"];

    }




}