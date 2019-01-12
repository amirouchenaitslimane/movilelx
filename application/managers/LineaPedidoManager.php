<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 28/12/2018
 * Time: 14:32
 */

namespace app;


class LineaPedidoManager
{
    protected $db ;
    public function __construct()
    {
        $this->db = Database::Db();
    }

    public function getLinaPedidoPedido($id)
    {
        $lineas = [];
        $q = $this->db->prepare("SELECT linea_pedido.* ,producto.* FROM linea_pedido INNER JOIN producto ON linea_pedido.producto_id = producto.id WHERE pedido_id = :id ");
        $q->execute([':id'=>$id]);
        while ($row = $q->fetch(\PDO::FETCH_OBJ)){
            $lineas[] = $row;
        }
        return $lineas;



    }

    public function TotalPrecioCompra($pedido_id)
    {
        $q = $this->db->prepare("SELECT SUM(linea_pedido.precio_compra) as total ,pedido.id FROM linea_pedido INNER join pedido ON linea_pedido.pedido_id = pedido.id WHERE pedido.id = :id");
        $q->execute([':id'=>$pedido_id]);
        return $q->fetch(\PDO::FETCH_OBJ);

    }


}