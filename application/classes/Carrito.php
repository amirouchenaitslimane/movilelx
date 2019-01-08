<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 26/12/2018
 * Time: 13:31
 */

namespace app;


class Carrito
{


    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
    }

    public function add(Producto $p,$qty=1)
    {
        if ($qty){
            $_SESSION['carrito'][$p->getId()] = $qty;
        }else{
            $_SESSION['carrito'][$p->getId()] = 1;
        }

    }


    public function getCarrito()
    {
        return $_SESSION['carrito'];
    }

    public function remove(Producto $p)
    {
        unset($_SESSION['carrito'][$p->getId()]);
    }

    public function count()
    {
        return count($_SESSION['carrito']);

    }

    public function total()
    {
        $nums = array_keys($_SESSION['carrito']);
        $total = 0;
        $manager = new ProductoManager();
        if (empty($nums)) {
            echo 0;
        } else {
            foreach ($nums as $value) {
                $total += $manager->getProduct($value)
                        ->getPrecio() * $_SESSION['carrito'][$manager->getProduct($value)->getId()];
            }

            return $total;
        }
    }

    public function updateQty(Producto $p,$qty){
        if (isset($_SESSION['carrito'][$p->getId()])) {
            $_SESSION['carrito'][$p->getId()] = $qty;
        }else{
            $_SESSION['carrito'][$p->getId()] = 1;

        }

    }
}