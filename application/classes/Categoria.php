<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 18/12/2018
 * Time: 15:59
 */

namespace app;


class Categoria
{
    private $id;
    private $padre_id;
    private $nombre;
    private $descripcion;
    private $activo = 1;
    private $childs =[];

    private $errors = [];

    const ESTADO_ACTIVO = 1;
    const  ESTADO_INACTIVO = 0;
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
    public function getPadreId()
    {
        return $this->padre_id;
    }

    /**
     * @param mixed $padre_id
     */
    public function setPadre_id($padre_id)
    {

        $this->padre_id = (int)$padre_id;
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
        if(empty($nombre)){
            $this->errors[] = "Nombre de la categoría es obligatorio";
        }

        $this->nombre = $nombre;
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
        $this->descripcion = (string)$descripcion;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     */
    public function setActivo($activo)
    {

        $this->activo = $activo;
    }

    /**
     * @return array
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
     * @param array $childs
     */
    public function setChilds(array $childs)
    {
        $this->childs = $childs;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param string $errors
     */
    public function setErrors($errors)
    {
        $this->errors[] = $errors;
    }

    public static function getEstadoOption()
    {
        return [
            self::ESTADO_ACTIVO =>"Activa",
            self::ESTADO_INACTIVO =>"Inactiva",
        ];
    }

}