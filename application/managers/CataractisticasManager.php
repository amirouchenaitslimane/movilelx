<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 23/12/2018
 * Time: 21:11
 */

namespace app;


class CataractisticasManager
{

    protected $db;
    public function __construct()
    {
        $this->db = Database::Db();
    }


    public function addCaracteristicas($caracteristicasLists)
    {
        try{
            $this->db->beginTransaction();
            $sql = "INSERT INTO `caracteristicas`(`id`, `label`, `valor`, `producto_id`) VALUES (null,:label,:valor,:producto_id)";
            $q = $this->db->prepare($sql);

            foreach ($caracteristicasLists as $c) {

                $q->bindValue(':label',$c->getLabel());
                $q->bindValue(':valor',$c->getValor());
                $q->bindValue('producto_id',$c->getProductId());
                $q->execute();
            }
            $this->db->commit();


        }catch (\Exception $e){
            $this->db->rollBack();
            $e->getMessage();
        }
    }

    public function findByProduct($id_product)
    {
        $caracteristicas = [];
        $q = $this->db->prepare('SELECT * FROM caracteristicas WHERE producto_id=:id');
        $q->execute(['id'=>$id_product]);
        while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
            $caracteristicas[] = new Caracteristicas($row);
        }
        return $caracteristicas;
    }

    public function deleteCaracteristica($id)
    {
        $q = $this->db->exec("DELETE FROM caracteristicas WHERE id = $id");
    }


    public function getOne($id)
    {
        $q = $this->db->prepare("SELECT * FROM caracteristicas WHERE id = :id");
        $q->execute([':id'=>$id]);
        $row = $q->fetch(\PDO::FETCH_ASSOC);
        return new Caracteristicas($row);

    }

    public function updateOne(Caracteristicas $c)
    {
        $sql = "UPDATE caracteristicas SET label = :label, valor=:valor where id = :id";
        $q = $this->db->prepare($sql);
        $q->bindValue(':label',$c->getLabel());
        $q->bindValue('valor',$c->getValor());
        $q->bindValue('id',$c->getId());
        $q->execute();
    }

}