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
        try{
            $manager = new ProductoManager();
            $ids = array_keys($_COOKIE['carrito']);
            $arry_products = [];

            foreach ($ids as $value) {
                $arry_products[] = $manager->getProduct($value);
            }
            return $arry_products;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }


    }

    public function precioTotal(Producto $producto,array $carrito)
    {

        if($producto->getPrecioReducido() !== null){
            $total = $producto->getPrecioReducido() * $carrito[$producto->getId() ];
        }else{
            $total = $producto->getPrecio() * $carrito[$producto->getId() ];

        }
        return $total;
    }

}