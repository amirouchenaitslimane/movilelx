<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 20/12/2018
 * Time: 12:11
 */

namespace app;


class Caracteristicas
{
    private $id;
    private $label;
    private $valor;
    private $informacion;
    private $product_id;
    use Hydrator;

    /**
     * Caracteristicas constructor.
     * @param array $data
     */
    public function __construct(array $data =[])
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
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getInformacion()
    {
        return $this->informacion;
    }

    /**
     * @param mixed $informacion
     */
    public function setInformacion($informacion)
    {
        $this->informacion = $informacion;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }



}