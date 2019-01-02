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


}