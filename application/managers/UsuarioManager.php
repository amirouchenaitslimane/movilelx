<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 30/11/2018
 * Time: 19:09
 */
namespace app;
use PDO;

class UsuarioManager
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::Db();
    }

    /**
     * Metodo para insertar un usuario en la base de datos
     * @param Usuario $usuario
     * @throws \Exception
     */
    public function addUsuario(Usuario $usuario)
    {
        try{
            $sql = "INSERT INTO 
              `usuario`(`id`, `nombre`, `apellido`, `direccion`, `email`, `password`, `created`, `updated`, `role`) 
              VALUES (null,:nombre,:apellido,:direccion,:email,:password,:created,:updated,:role)";

            $q = $this->db->prepare($sql);

            $q->bindValue(':nombre',$usuario->getNombre());
            $q->bindValue(':apellido',$usuario->getApellido());
            $q->bindValue(':direccion',$usuario->getDireccion());
            $q->bindValue(':email',$usuario->getEmail());
            $q->bindValue(':password',password_hash($usuario->getPassword(),PASSWORD_DEFAULT));
            $q->bindValue(':created',(new \DateTime('now'))->format('Y-m-d'));
            $q->bindValue(':updated',null);
            $q->bindValue(':role',$usuario->getRole());
            $q->execute();
        }catch(\PDOException $e){
            echo 'error al guardar usuario '.$e->getMessage();
        }

    }

    /**
     * Metodo para buscar usuario en la base de dato
     * @param $id int id del usuari
     * @return Usuario|null Objeto usuario | null si no existe
     */
    public function findUsuario($id)
    {
        try{
            $id = (int)$id;
            $sql = "SELECT * FROM usuario WHERE id =".$id;
            $q = $this->db->query($sql);
            $data = $q->fetch(PDO::FETCH_ASSOC);
            if($data){
                return new Usuario($data);
            }else{
                return null;
            }

        }catch (\PDOException $e){
            echo "error : ".$e->getMessage();
        }
    }

    /**
     * metodo para buscar por email
     * @param $email string email del usuario
     * @return Usuario
     */
    public function getByEmail($email)
    {
        try{
            $sql =  "SELECT * FROM usuario WHERE email = :email ";
            $query = $this->db->prepare($sql);
            $query->execute([':email'=>$email]);
            $data = $query->fetch(PDO::FETCH_ASSOC);

            if($data !== false){
                return new Usuario($data);

            }

        }catch (\PDOException $e){
            echo "error : ".$e->getMessage();
        }
    }


    /**
     * metodo para actualizar usuario
     * @param Usuario $usuario
     */
    public function Update(Usuario $usuario)
    {
    try{
        $sql = 'UPDATE usuario SET nombre= :nombre,apellido=:apellido,direccion=:direccion,email=:email,updated=now(),role=:role,active=:active   where id=:id';
         $q = $this->db->prepare($sql);

        $q->bindValue(':nombre',$usuario->getNombre());

        $q->bindValue(':apellido',$usuario->getApellido());
        $q->bindValue(':direccion',$usuario->getDireccion());
        $q->bindValue(':email',$usuario->getEmail());
        $q->bindValue(':role',$usuario->getRole());
        $q->bindValue(':active',$usuario->isActive());
        $q->bindValue(':id',$usuario->getId());
        $q->execute();
    }catch(\PDOException $e){echo $e->getMessage();}

    }

    /**
     * metodo para eliminar usuario
     * @param Usuario $usuario
     */
    public function delete(Usuario $usuario)
    {
        $this->db->exec('UPDATE  usuario SET active = 0 WHERE id = '.$usuario->getId());

    }


    public function getClientes($start=null,$offset=null)
    {
        try{
            $users = [];
            $sql = "SELECT * FROM usuario WHERE role = 2 ";
            if($start !== null && $offset !== null){
                $sql .= "LIMIT $start,$offset";
            }
            $q = $this->db->query($sql);
            while ($row = $q->fetch(\PDO::FETCH_ASSOC))
            {
                $users[] = new Usuario($row);
            }
            return $users;
        }catch (\PDOException $e){
            echo "error ".$e->getMessage();
        }
    }


    public function getAdminstradores($start=null,$offset=null)
    {
        try{
            $users = [];
            $sql = "SELECT * FROM usuario WHERE role = 1 ORDER BY created DESC ";
            if($start !== null && $offset !== null){
                $sql .= "LIMIT $start,$offset";
            }

            $q = $this->db->query($sql);
            while ($row = $q->fetch(\PDO::FETCH_ASSOC))
            {
                $users[] = new Usuario($row);
            }
            return $users;
        }catch (\PDOException $e){
            echo "error ".$e->getMessage();
        }
    }

    public function countClientes($role)
    {
       try{
           $sql = "SELECT id FROM usuario WHERE role= :role";
           $q = $this->db->prepare($sql);
           $q->execute([':role'=>$role]);
           return $q->rowCount();
       }catch (\PDOException $e){
           echo $e->getMessage();
       }
    }

    public function getByPedido($id_pedido)
    {
      try{
          $sql = "SELECT 
                  u.id as cliente_id ,u.nombre,u.apellido,u.direccion,u.email,u.active,u.created, 
                  ped.id,ped.usuario_id,ped.estado,ped.fecha , 
                  lp.id,lp.pedido_id,lp.producto_id,lp.cantidad,lp.precio_compra , 
                  prod.id as producto ,prod.nombre as nombre_producto,prod.precio,prod.imagen 
                  from usuario u 
                    INNER JOIN pedido ped 
                      ON u.id = ped.usuario_id 
                    INNER JOIN linea_pedido lp 
                      ON ped.id = lp.pedido_id 
                    INNER JOIN producto prod 
                      ON lp.producto_id = prod.id
                  WHERE ped.id = :id";
          $q = $this->db->prepare($sql);
          $q->execute([':id'=>$id_pedido]);
          $cliente = new Usuario();
          $pedido = new Pedido();
          $lineas = [];
          while ( $data =  $q->fetch(PDO::FETCH_OBJ)){
              $cliente->setId($data->cliente_id);
              $cliente->setNombre($data->nombre);
              $cliente->setApellido($data->apellido);
              $cliente->setEmail($data->email);
              $cliente->setDireccion($data->direccion);
              $cliente->setActive($data->active);
              $cliente->setCreated($data->created);
              $pedido->setId($data->pedido_id);
              $pedido->setUsuarioId($data->cliente_id);
              $pedido->setEstado($data->estado);
              $pedido->setFecha($data->fecha);
              $linea = new LineaPedido();

              $linea->setId($data->id);
              $linea->setPedidoId($data->pedido_id);
              $linea->setProductoId($data->producto_id);
              $linea->setPrecioCompra($data->precio_compra);
              $linea->setCantidad($data->cantidad);
              $producto = new Producto();
              $producto->setId($data->producto);

              $producto->setNombre($data->nombre_producto);
              $producto->setPrecio($data->precio);
              $producto->setImagen($data->imagen);
              $linea->setProductos($producto);
              $lineas[] = $linea;
          }
          foreach ($lineas as $l) {
              $pedido->setLineas($l);
          }
          $cliente->setPedidos($pedido);
          return $cliente;

      }catch (\PDOException $e){
          echo  $e->getMessage();
      }
    }


}