<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 28/12/2018
 * Time: 14:29
 */

namespace app;


class PedidoManager
{
protected $db;

public function __construct()
{
    $this->db = Database::Db();

}

    public function process(Pedido $pedido)
    {
    try{
        $this->db->beginTransaction();
        $q = $this->db->prepare("INSERT 
                INTO `pedido`(`id`, `usuario_id`, `estado`, `fecha`)
                VALUES( null,:usuario_id,0,now() )");
        $q->bindValue(':usuario_id',$pedido->getUsuarioId());
        $q->execute();
        $id = $this->db->lastInsertId();
        $q2 = $this->db->prepare("INSERT INTO `linea_pedido`(`id`, `pedido_id`, `producto_id`, `precio_compra`, `cantidad`, `fecha_recep`) VALUES (null,:pedido_id, :producto_id,:precio_compra,:cantidad,null )");
        foreach ($pedido->getLineas() as $linea){
            $q2->bindValue(':pedido_id',$id);
            $q2->bindValue(':producto_id',$linea->getProductoId());
            $q2->bindValue(':precio_compra',$linea->getPrecioCompra());
            $q2->bindValue(':cantidad',$linea->getCantidad());

            $q2->execute();
        }
        $this->db->commit();
    }catch (\PDOException $e){
        $this->db->rollBack();
        echo $e->getMessage();
    }
    }

    public function getPedido($usuario_id)
    {
        $a = [];
//        $sql = "SELECT
//                p.id,
//                p.usuario_id,
//                p.estado,
//                p.fecha,
//                l.id,
//                l.pedido_id,
//                l.producto_id,
//                l.precio_compra,
//                l.cantidad,
//                l.fecha_recep
//            FROM
//                pedido p
//            INNER JOIN linea_pedido l ON
//                p.id = l.pedido_id
//            WHERE
//                p.usuario_id = :id ";
//        $q = $this->db->prepare($sql);
//        $q->execute([':id'=>$usuario_id]);
//        while ($row = $q->fetch(\PDO::FETCH_OBJ)){
//
//
//            $a[] = $row;
//        }
//        return $a;
        $sql="SELECT * FROM pedido WHERE usuario_id = :usuario_id";
        $q = $this->db->prepare($sql);
        $q->execute([':usuario_id'=>$usuario_id]);
        while ($row = $q->fetch(\PDO::FETCH_ASSOC))
        {
            $a[] =new Pedido($row);
        }
        return $a;
    }







}