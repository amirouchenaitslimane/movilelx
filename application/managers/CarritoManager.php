<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 26/12/2018
 * Time: 13:31
 */

namespace app;


class CarritoManager
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::Db();
    }
    function getCrrito() {
        $manager = new ProductoManager();
        $ids = array_keys($_SESSION['carrito']);
        $arry_products = [];

        foreach ($ids as $value) {
            $arry_products[] = $manager->getProduct($value);
        }
        return $arry_products;

    }

}