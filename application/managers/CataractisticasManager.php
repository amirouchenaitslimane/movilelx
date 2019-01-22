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

    /**
     * Añadir lista de carcteristica para cada objeto
     * @param $caracteristicasLists array de Caracteristica
     */
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

    /**
     * metodo para devolver las carcteristicas de cada producto
     * @param $id_product int id del producto
     * @return array lista de caracteristicas
     */
    public function findByProduct($id_product)
    {
        try{
            $caracteristicas = [];
            $q = $this->db->prepare('SELECT * FROM caracteristicas WHERE producto_id=:id');
            $q->execute(['id'=>$id_product]);
            while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
                $caracteristicas[] = new Caracteristicas($row);
            }
            return $caracteristicas;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * metodo para eliminar caracteristica
     * @param $id
     */
    public function deleteCaracteristica($id)
    {
        $q = $this->db->exec("DELETE FROM caracteristicas WHERE id = $id");
    }

    /**
     * devolver una caracteristica
     * @param $id
     * @return Caracteristicas
     */
    public function getOne($id)
    {
        try{
            $q = $this->db->prepare("SELECT * FROM caracteristicas WHERE id = :id");
            $q->execute([':id'=>$id]);
            $row = $q->fetch(\PDO::FETCH_ASSOC);
            return new Caracteristicas($row);
        }catch(\PDOException $e){
            echo $e->getMessage();
        }

    }

    /**
     * metodo para actualizar carcteristica
     * @param Caracteristicas $c
     */
    public function updateOne(Caracteristicas $c)
    {
        try{
            $sql = "UPDATE caracteristicas SET label = :label, valor=:valor where id = :id";
            $q = $this->db->prepare($sql);
            $q->bindValue(':label',$c->getLabel());
            $q->bindValue('valor',$c->getValor());
            $q->bindValue('id',$c->getId());
            $q->execute();
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

}