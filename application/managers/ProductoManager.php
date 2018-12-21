<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 20/12/2018
 * Time: 12:08
 */

namespace app;


class ProductoManager
{

    protected $db;
    public function __construct()
    {
        $this->db = Database::Db();
    }

    /**
     * @param Producto $p
     *
     */
    public function addProducto(Producto $p)
    {
        try{
            $sql = "INSERT 
                    INTO `producto`(`id`, `nombre`, `descripcion`, `precio`, `imagen`, `active`, `categoria_id`, `created_at`, `updated_at`)
                    VALUES (null,:nombre,:descripcion,:precio,:imagen,:active,:categoria_id,:created_at,null)";

            $q = $this->db->prepare($sql);
            $q->bindValue(':nombre',$p->getNombre());
            $q->bindValue(':descripcion',$p->getDescripcion());
            $q->bindValue(':precio',$p->getPrecio());
            $q->bindValue(':imagen',$p->getImage());
            $q->bindValue(':active',$p->getActive());
            $q->bindValue(':categoria_id',$p->getCategoriaId());
            $q->bindValue(':created_at',(new \DateTime('now'))->format('Y-m-d'));

            if($q->execute()){

            }

        }catch (\PDOException $e){
            die($e->getMessage());
        }




    }

    public function getAll($start=null,$offset=null)
    {
       try{
           $products = [];

           $sql ="SELECT * FROM producto where active=1 ";

           if($start !== null && $offset!== null){
               $sql .=" LIMIT $start,$offset";

           }

           $q = $this->db->query($sql);

           while ($row = $q->fetch(\PDO::FETCH_ASSOC))
           {
               $products[] = new Producto($row);
           }
           return $products;
       }catch (\PDOException $e)
       {
           echo "error :".$e->getMessage();
       }
    }


    public function getProduct($id)
    {
        $sql = "SELECT * FROM producto WHERE id=:id";
        $q = $this->db->prepare($sql);
        $q->execute([':id'=>$id]);
        $row = $q->fetch(\PDO::FETCH_ASSOC);
        return new Producto($row);
    }

    public function count($active=1)
    {
        $sql = "SELECT id FROM producto WHERE active= :active";
        $q = $this->db->prepare($sql);
        $q->execute([':active'=>$active]);
        return $q->rowCount();
    }
}