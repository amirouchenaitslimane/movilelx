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


    public function getpedidos()
    {
        $pedidos = [];
        $sql = "SELECT p.id,p.usuario_id,p.fecha,p.estado,u.nombre,u.direccion, COUNT(lp.pedido_id) as num_lineas FROM pedido p INNER JOIN usuario u ON p.usuario_id = u.id INNER JOIN linea_pedido lp ON p.id = lp.pedido_id GROUP BY p.id";
        $q = $this->db->prepare($sql);
        $q->execute();
        while ($row = $q->fetch(\PDO::FETCH_OBJ )){
            $pedidos[]= $row;
        }
        return $pedidos;
    }

    public function count($estado=1)
    {
        try{
            $sql = "SELECT id FROM pedido WHERE estado = :active";
            $q = $this->db->prepare($sql);
            $q->execute([':active'=>$estado]);
            return $q->rowCount();
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }

    public function getOne($id)
    {$li = [];
        $sql = "SELECT 
                  p.id,p.usuario_id,p.fecha,p.estado,l.id as linea_id, 
                  l.* FROM pedido p INNER  JOIN  linea_pedido l  ON p.id = l.pedido_id  WHERE  p.id = :id";
        $q = $this->db->prepare($sql);
        $q->execute([':id'=>$id]);
        while($data = $q->fetch(\PDO::FETCH_ASSOC)){
            $l = new LineaPedido();
            $l->setId($data['linea_id']);
            $l->setCantidad($data['cantidad']);
            $l->setPrecioCompra($data['precio_compra']);
            $l->setPedidoId($data['pedido_id']);
            $l->setProductoId($data['producto_id']);
            $pedido = new Pedido($data);

            $li[] = $l;
            foreach ($li as $item){
                $pedido->setLineas($item);
            }
        }
        return $pedido;
    }

    public function gastosCliente($cliente_id)
    {
        try{
            $sql="SELECT SUM(precio_compra) AS gasto_total ,pedido_id,pedido.id FROM linea_pedido INNER JOIN pedido ON pedido.id = linea_pedido.pedido_id WHERE pedido.usuario_id = :cliente_id";
            $q = $this->db->prepare($sql);
            $q->execute([':cliente_id'=>$cliente_id]);
            $result = $q->fetch(\PDO::FETCH_ASSOC);
            return $result['gasto_total'];
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

         }


    public function pedidosEstadisicas()
    {
        $estadisticas = [];
        $sql = "SELECT u.id ,u.nombre,p.id,p.fecha,sum(lp.precio_compra) as precio  FROM usuario u INNER JOIN pedido p ON u.id = p.usuario_id INNER JOIN linea_pedido lp ON p.id = lp.pedido_id GROUP by u.id";
        $q = $this->db->prepare($sql);
        $q->execute();
        while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
            $estadistica = [];
            $estadistica['nombre'] = $row['nombre'];
            $estadistica['precio'] = $row['precio'];
            $estadisticas[] = $estadistica;
        }
        return $estadisticas;
    }

}