<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 24/11/2018
 * Time: 18:38
 */

namespace app;


use PDO;

class Database
{
    protected static $instance;
    protected function __construct() {}

    public static function Db() {


            try{
                $config  = self::getConfigDataBase();
                self::$instance = new PDO("mysql:host=".$config['db_host'].';dbname='.$config['db_name'], $config['db_user'], $config['db_password'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            }catch (\Exception $error){
                die(" Fallo de connexion ".$error->getMessage());
        }

            return self::$instance;
    }

    /**
     * @throws \Exception
     */
    private static function getConfigDataBase(){
        if(!file_exists(dirname(__DIR__)."/config/config_database.php")){


            throw new \Exception('El fichero de configuracion no existe');
        }
        $file =  include dirname(__DIR__)."/config/config_database.php";
        return $file;



    }






}