<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 18/12/2018
 * Time: 16:15
 */

namespace app;


class CategoriaManager
{

    protected $db;

    public function __construct()
    {
        $this->db = Database::Db();
    }

    public function getAll($start=null,$end=null)
    {
        try{
            $catgories = [];
            $sql = "SELECT 
                      c1.id ,c1.nombre    
                AS    padre,c2.nombre 
                AS    hijo ,COUNT(producto.id) 
                AS total_proodctos 
                FROM 
                     categoria c1 
                inner join 
                       categoria c2 
                         ON c1.id = c2.padre_id 
                LEFT JOIN 
                       producto 
                         ON producto.categoria_id = c2.id 
                         OR producto.categoria_id = c1.id 
                WHERE c1.activo = 1 
                        AND c2.activo = 1 
                GROUP BY c2.id ";
            if($start !== null && $end !== null){
                $sql .= "LIMIT $start,$end";
            }

            $q = $this->db->query($sql);


            while ($row = $q->fetch(\PDO::FETCH_OBJ))
            {

                $catgories[] = $row;
            }
            return $catgories;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }


    /**
     * ELIMINAR
     * @param int $id_padre
     * @return array
     */
    public function getByParents($id_padre = 5)
    {
        $parents = [];
        $q =$this->db->prepare("SELECT * FROM categoria WHERE padre_id = :padre AND activo = 1");

        $q->execute([':padre'=>$id_padre]);
        while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
            $parents[] = new Categoria($row);
        }
        return $parents;

    }

    public function displayCategorias()

    {
       try{
           $parents = [];
           $sql = "SELECT * from categoria where padre_id = 0 and activo = 1";
           $q = $this->db->prepare($sql);
           $q->execute();
           while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
               $c = new Categoria($row);
               if(!empty($this->getByParent($c->getId()))){

                   $c->setChilds($this->getByParent($c->getId()));
               }
               $parents[] = $c;
           }
           return $parents;
       }catch (\PDOException $e){
           echo $e->getMessage();
       }
    }

    public function getByParent($id)
    {
        try{
            $parents = [];
            $sql2 = "SELECT * from categoria where padre_id =:id and activo =1 ";
            $q2 = $this->db->prepare($sql2);
            $q2->execute([':id'=>$id]);
            while ($row = $q2->fetch(\PDO::FETCH_ASSOC)){
                $c = new Categoria($row);

                $parents[] = $c;
            }
            return $parents;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }

    public function getParents()
    {
        try{
            $categoria_padre = [];
            $sql = "SELECT * from categoria where padre_id = 0 and activo = 1 ";
            $q = $this->db->prepare($sql);
            $q->execute();
            while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
                $categoria_padre[] = new Categoria($row);
            }
            return $categoria_padre;
        }catch (\PDOException $e){
            echo "error en getparent ".$e->getMessage();
        }
    }

    public function addCategory(Categoria $category)
    {

        try{
            $this->db->beginTransaction();
            $this->db->query('set FOREIGN_KEY_CHECKS=0');

            $sql = "INSERT INTO `categoria`(`id`, `nombre`, `descripcion`, `padre_id`, `activo`) VALUES (null,:nombre,:descripcion,:padre_id,:activo)";
            $q = $this->db->prepare($sql);
            $q->bindValue(':nombre',$category->getNombre());
            $q->bindValue(':descripcion',$category->getDescripcion());
            $q->bindValue(':padre_id',$category->getPadreId());

            $q->bindValue(':activo',$category->getActivo());
            $q->execute();

            $this->db->query('set FOREIGN_KEY_CHECKS=1');
            $this->db->commit();



        }catch (\PDOException $e){
            die('error '.$e->getMessage());
        }





    }

    public function getProductsCategory($id,$start=null,$offset=null) {
        $products = array();
        $sql = "SELECT categoria.nombre,categoria.id ,producto.*,image.* FROM categoria INNER JOIN producto ON categoria.id = producto.categoria_id INNER join image ON image.producto_id = producto.id WHERE categoria.id = :id ";
        if($start !== null && $offset !== null){
            $sql .= "LIMIT $start,$offset";
        }
        $q = $this->db->prepare($sql);
        $q->execute([':id'=>$id]);

        while ($row = $q->fetch(\PDO::FETCH_OBJ))
        {
            $products[] = $row;
        }
        return $products;

    }

    public function contProductsCategory($id)
    {
        $sql = "SELECT id from producto where categoria_id=:id";
        $q = $this->db->prepare($sql);
        $q->execute([':id'=>$id]);
        return $q->rowCount();

    }



}