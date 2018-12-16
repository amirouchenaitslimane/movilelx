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
     * metodo para devover todos los usuario de la base de datos excepto el super admin
     * @return array
     */
    public function getAll()
    {
        try{
            $users = [];
            $sql = "SELECT * FROM usuario WHERE role != 10 ";
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

    /**
     * metodo para actualizar usuario
     * @param Usuario $usuario
     */
    public function Update(Usuario $usuario)
    {
    try{
        $sql = 'UPDATE usuario SET nombre= :nombre,apellido=:apellido,direccion=:direccion,email=:email,updated=now(),role=:role  where id=:id';
    $q = $this->db->prepare($sql);

        $q->bindValue(':nombre',$usuario->getNombre());

        $q->bindValue(':apellido',$usuario->getApellido());
        $q->bindValue(':direccion',$usuario->getDireccion());
        $q->bindValue(':email',$usuario->getEmail());
        $q->bindValue(':role',$usuario->getRole());
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
        $this->db->exec('DELETE FROM usuario WHERE id = '.$usuario->getId());

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
            $sql = "SELECT * FROM usuario WHERE role = 1 ";
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
        $sql = "SELECT id FROM usuario WHERE role= :role";
        $q = $this->db->prepare($sql);
        $q->execute([':role'=>$role]);
        return $q->rowCount();
    }

}