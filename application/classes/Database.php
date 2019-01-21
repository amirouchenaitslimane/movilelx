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

                self::$instance = new PDO("mysql:host=".DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            }catch (\Exception $error){
                //die(" Fallo de connexion ".$error->getMessage());

                redirect('error');
        }

            return self::$instance;
    }







}