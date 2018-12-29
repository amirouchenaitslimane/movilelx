<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 30/11/2018
 * Time: 19:03
 */

namespace app;


class Usuario
{
    private $id;
    private $nombre;
    private $apellido;
    private $direccion;
    private $email;
    private $password;
    private $rpassword;
    private $role;
    private $created;
    private $updated;
    private $active;
    private static $ROLE_SUPER_ADMIN = 10;
    private static $ROLE_ADMIN = 1;
    private static $ROLE_CLIENTE = 2;

    private static $ESTADO_ACTIVO = 1;
    private static $ESTADO_INACTIVO = 0;

    private $errors = [];


    use Hydrator;
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }

        //$this->created = (new \DateTime('now'))->format('Y-m-d');
       if($this->role == null){
           $this->role = self::$ROLE_CLIENTE;
       }
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        if(empty($nombre)){
            $this->errors[] = "Nombre del cliente es obligatorio";
        }
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        if(empty($apellido)){
            $this->errors[] = "Apellido del usuario es obligatorio";
        }
        $this->apellido = $apellido;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->errors[] = "Email del usuario vacio o incorrecto";
        }
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {

        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        if (!isset($role)) {
            $this->role = self::$ROLE_CLIENTE;
        } else {
            $this->role = $role;
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getCreated()
    {
       return (new \DateTime($this->created))->format('d-m-Y');
    }

    public function setCreated($date)
    {
        $this->created = $date;
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    public function getUpdated()
    {
        if(isset($this->updated )) {
            return (new \DateTime($this->updated))->format('d-m-Y');
        }

        }

    /**
     * @param mixed $updated_at
     * @throws \Exception
     */
    public function setUpdated($updated_at)
    {
        if (!empty($updated_at)) {
            $this->updated = (new \DateTime($updated_at))->format('Y-m-d');
        }
    }









    public function getErrors()
    {
        return $this->errors;

    }

    public function getRoleOption()
    {
        return [self::$ROLE_ADMIN => "ADMIN",self::$ROLE_SUPER_ADMIN=>"SUPER ADMINISTRADOR",self::$ROLE_CLIENTE => "CLIENTE"];
    }


    public function hasRole($role)
    {

       if(in_array($role,array_values($this->getRoleOption()))){
           return "si";
       }
       return  "no";

    }


    public function isCliente()
    {
      return ($this->getRole() === (string) self::$ROLE_CLIENTE);
    }

    public function isSuperAdmin()
    {
        return ($this->getRole() === (string) self::$ROLE_SUPER_ADMIN);

    }

    public function isAdmin()
    {
        return ($this->getRole() === (string) self::$ROLE_ADMIN);

    }

    public function addError($error)
    {
        $this->errors[] = $error;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        if(empty($password)){
            $this->errors[] = "Contrasña obligatoria !";
        }
        $this->password = $password;
    }

    public function isPasswordValid($password){
        return password_verify($password,$this->getPassword());
    }

    public function setError($error_string)
    {
        $this->errors[] = $error_string ;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        if(empty($direccion)){
            $this->errors[] = "dirección del cliente es obligatorio";
        }

        $this->direccion = $direccion;
    }

    public function setRpassword($rpassword)
    {
        if(empty($rpassword)){
            $this->errors[] = "repite la contraseña del cliente ";
        }
        $this->rpassword = $rpassword;

    }

    /**
     * @return mixed
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getEstadoOption()
    {
        return [
            self::$ESTADO_ACTIVO => "Activo",
            self::$ESTADO_INACTIVO => "Inactivo"
        ];

    }





}