<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 28/12/2018
 * Time: 14:02
 */
namespace app;
class LineaPedido
{

    private $id;
    private $pedido_id;
    private $producto_id;
    private $precio_compra;
    private $cantidad;
    private $fecha_recp;

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
    public function getPedidoId()
    {
        return $this->pedido_id;
    }

    /**
     * @param mixed $pedido_id
     */
    public function setPedidoId($pedido_id)
    {
        $this->pedido_id = $pedido_id;
    }

    /**
     * @return mixed
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * @param mixed $producto_id
     */
    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
    }

    /**
     * @return mixed
     */
    public function getPrecioCompra()
    {
        return $this->precio_compra;
    }

    /**
     * @param mixed $precio_compra
     */
    public function setPrecioCompra($precio_compra)
    {
        $this->precio_compra = $precio_compra;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getFechaRecp()
    {
        return $this->fecha_recp;
    }

    /**
     * @param mixed $fecha_recp
     */
    public function setFechaRecp($fecha_recp)
    {
        $this->fecha_recp = $fecha_recp;
    }






}