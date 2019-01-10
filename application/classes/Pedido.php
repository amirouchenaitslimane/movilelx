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

    const ESTADO_EN_PROCESO = 0;
    const ESTADO_ENTREGADO = 1;
    const ESTADO_CANCELADO = 2;
    const ESTADO_ELIMINADO = 3;
    const ESTADO_EN_CAMINO = 4;

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
        return (new \DateTime($this->fecha))->format('d-m-Y');
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


    public static function getEstadoOption()
    {
        return [
            self::ESTADO_EN_PROCESO => "En proceso",
            self::ESTADO_ENTREGADO =>"Entregado",
            self::ESTADO_CANCELADO =>"Cancelado",
            self::ESTADO_ELIMINADO =>"Eliminado",
            self::ESTADO_EN_CAMINO =>"En camino"
        ];
    }

}