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
        $q = $this->db->prepare("SELECT * FROM linea_pedido WHERE pedido_id=:pedido_id");
        $q->execute([':pedido_id'=>$id]);
        while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
            $lineas = new LineaPedido($row);
        }
        return $lineas;



    }


}