<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 28/12/2018
 * Time: 14:02
 */

namespace app;


class Pedido
{
    private $id;
    private $usuario_id;
    private $estado ;
    private $fecha;
    private $lineas = [];


    use Hydrator;
    public function __construct(array $data=[])
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
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return array
     */
    public function getLineas()
    {
        return $this->lineas;
    }

    /**
     * @param array $lineas
     */
    public function setLineas(LineaPedido $lineaPedido)
    {
        $lineaPedido->setPedidoId($this->id);
        $this->lineas[] = $lineaPedido;
    }



}