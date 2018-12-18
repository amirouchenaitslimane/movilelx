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

    public function getAll()
    {
        $catgories = [];
        $sql = "SELECT c1.nombre,c1.padre_id as padre,c1.activo, c2.nombre,c2.activo FROM categoria c1 INNER JOIN categoria c2 ON c1.id = c2.padre_id WHERE c1.activo = 1 AND c2.activo = 1 ";


        $q = $this->db->query($sql);
        while ($row = $q->fetch(\PDO::FETCH_ASSOC))
        {
            $ct = [];
            if($row['padre'] == null){
                $ct['nombre_padre'] = $row['nombre'];
            }else{
                $ct['children'][] =$row['nombre'];
            }

            $catgories[] = $ct;
        }
        return $catgories;
    }




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
        $parents = [];
        $sql = "SELECT * from categoria where padre_id = 0 and activo = 1 order by nivel asc";


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
    }

    public function getByParent($id)
    {
        $parents = [];
        $sql2 = "SELECT * from categoria where padre_id =:id and activo =1 order by nivel desc";
        $q2 = $this->db->prepare($sql2);
        $q2->execute([':id'=>$id]);
        while ($row = $q2->fetch(\PDO::FETCH_ASSOC)){
            $c = new Categoria($row);

            $parents[] = $c;
        }
        return $parents;

    }

    public function getParents()
    {
        $categoria_padre = [];
        $sql = "SELECT * from categoria where padre_id = 0 and activo = 1 order by nivel desc ";
        $q = $this->db->prepare($sql);
        $q->execute();
        while ($row = $q->fetch(\PDO::FETCH_ASSOC)){
            $categoria_padre[] = new Categoria($row);
        }
        return $categoria_padre;
    }

    public function addCategory(Categoria $categoria)
    {
       try{
           $sql = "INSERT INTO `categoria`(`id`, `padre_id`, `nombre`, `descripcion`, `activo`) VALUES (null,:padre_id,:nombre,:descripcion,:activo)";
           $q = $this->db->prepare($sql);

               $q->bindValue(':padre_id', $categoria->getPadreId());

           $q->bindValue(':nombre',$categoria->getNombre());
           $q->bindValue(':descripcion',$categoria->getDescripcion());
           $q->bindValue(':activo',$categoria->getActivo());
           $q->execute();
       }catch (\PDOException $e){
           die($e->getMessage());
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