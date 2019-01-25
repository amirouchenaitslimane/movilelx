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
    protected $cm ;
    public function __construct()
    {
        $this->db = Database::Db();
        $this->cm = new CataractisticasManager();

    }

    /**
     * @param Producto $p
     *
     */
    public function addProducto(Producto $p)
    {
        try{
            $sql = "INSERT 
                    INTO `producto`(`id`, `nombre`, `descripcion`, `precio`, `imagen`, `active`, `es_oferta`, `tipo_oferta`, `precio_reducido`, `categoria_id`, `created_at`, `updated_at`)
                    VALUES (null,:nombre,:descripcion,:precio,:imagen,:active, :es_oferta,:tipo_oferta,:precio_reducido,:categoria_id,:created_at,null)";

            $q = $this->db->prepare($sql);
            $q->bindValue(':nombre',$p->getNombre());
            $q->bindValue(':descripcion',$p->getDescripcion());
            $q->bindValue(':precio',$p->getPrecio());
            $q->bindValue(':imagen',$p->getImagen());
            $q->bindValue(':active',$p->getActive());
            $q->bindValue(':es_oferta',$p->getEsOferta());
            $q->bindValue(':tipo_oferta',$p->getTipo_oferta());
            $q->bindValue(':precio_reducido',$p->getPrecioReducido());

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

           $sql ="SELECT p.id,p.nombre,p.precio,p.imagen,p.active,p.es_oferta,p.tipo_oferta,p.precio_reducido,p.created_at, c.nombre as category  FROM producto p INNER JOIN categoria c ON p.categoria_id = c.id WHERE 1=1";

           if($start !== null && $offset!== null){
               $sql .=" LIMIT $start,$offset";

           }
$sql .=" ORDER BY created_at DESC;";
           $q = $this->db->query($sql);

           while ($row = $q->fetch(\PDO::FETCH_OBJ))
           {
               $products[] = $row;
           }
           return $products;
       }catch (\PDOException $e)
       {
           echo "error :".$e->getMessage();
       }
    }


    public function getProduct($id)
    {
       try{
           $sql = "SELECT * FROM producto WHERE id=:id";
           $q = $this->db->prepare($sql);
           $q->execute([':id'=>$id]);
           $row = $q->fetch(\PDO::FETCH_ASSOC);
           if($row){
               return new Producto($row);

           }else{
              return null;
           }
       }catch (\PDOException $e){
           echo $e->getMessage();
       }
    }

    public function count($active=1)
    {
       try{
           $sql = "SELECT id FROM producto WHERE active= :active";
           $q = $this->db->prepare($sql);
           $q->execute([':active'=>$active]);
           return $q->rowCount();
       }catch(\PDOException $e){
           echo $e->getMessage();
       }
    }

    public function deleteProduct(Producto $p)
    {
        try{
            $sql = "UPDATE producto SET active=0 where id=:id";
            $q = $this->db->prepare($sql);
            $q->bindValue(':id',$p->getId());
            $q->execute();
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }

    public function updateProduct(Producto $producto)
    {
        try{
            $sql = "UPDATE 
                      `producto` 
                SET 
                   `nombre`=:nombre,
                    `descripcion`=:descripcion,
                    `precio`=:precio,
                    `imagen`=:imagen,
                    `active`=:active,
                    `es_oferta`=:es_oferta,
                    `tipo_oferta`=:tipo_oferta,
                    `precio_reducido`=:precio_reducido,                    
                    `categoria_id`=:categoria_id,                    
                    `updated_at`=:updated_at 
                WHERE 
                     id=:id";
            $q = $this->db->prepare($sql);
            $q->bindValue(':nombre',$producto->getNombre());
            $q->bindValue(':descripcion',$producto->getDescripcion());
            $q->bindValue(':precio',$producto->getPrecio());
            $q->bindValue(':imagen',$producto->getImagen());
            $q->bindValue(':active',$producto->getActive());
            $q->bindValue(':es_oferta',$producto->getEsOferta());
            $q->bindValue(':tipo_oferta',$producto->getTipo_oferta());
            $q->bindValue(':precio_reducido',$producto->getPrecioReducido());
            $q->bindValue('categoria_id',$producto->getCategoriaId());
            $q->bindValue(':updated_at',(new \DateTime('now'))->format('Y-m-d'));
            $q->bindValue(':id',$producto->getId());
            $q->execute();
        }catch (\PDOException $e){
            echo $e->getMessage();
        }


    }

    public function getProductDetail($id)
    {
        try{
            $sql = "SELECT * FROM producto WHERE id=:id";
            $q = $this->db->prepare($sql);
            $q->execute([':id'=>$id]);
            $row = $q->fetch(\PDO::FETCH_ASSOC);
            if($row){
                $p = new Producto($row);
                $p->setCaracteristicas($this->cm->findByProduct($p->getId()) );
                return $p;

            }else{
                return null;
            }
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }


    public function getUltimosProductos()
    {
       try{
           $sql = "SELECT p.id,p.nombre,p.precio,p.imagen,p.active,p.created_at, c.nombre as category FROM producto p INNER JOIN categoria c ON p.categoria_id = c.id   order by created_at DESC LIMIT 0,3";
           $q = $this->db->prepare($sql);
           $q->execute();
           $res = $q->fetchAll(\PDO::FETCH_OBJ);
           return $res;
       }catch (\PDOException $e){
           echo $e->getMessage();
       }
    }


    public function getProductInfo($id)
    {
        try{
            $sql = "SELECT p.id, p.nombre, p.descripcion, p.precio, p.imagen, p.active, p.created_at, p.categoria_id, c.nombre as category, SUM(lp.producto_id) as en_venta FROM producto p INNER JOIN categoria c ON p.categoria_id = c.id INNER JOIN linea_pedido lp ON p.id = lp.producto_id WHERE P.id=:id";
            $q = $this->db->prepare($sql);
            $q->execute([':id'=>$id]);
            $result = $q->fetch(\PDO::FETCH_OBJ);
            return $result;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }

    public function promo()
    {
        $promo = [];
        $sql = "SELECT p.id,p.nombre as nombre_producto,p.precio,p.es_oferta,p.precio_reducido,p.tipo_oferta,p.imagen,p.categoria_id, c.nombre FROM producto p INNER join categoria c ON p.categoria_id = c.id where p.es_oferta = 1 and p.active = 1 and p.tipo_oferta > 0 ;";
        $q = $this->db->prepare($sql);
        $q->execute();
        while ($data = $q->fetch(\PDO::FETCH_OBJ)){
            $promo[] = $data;
        }
return $promo;
    }

}