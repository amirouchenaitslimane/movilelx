<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 15/01/2019
 * Time: 21:34
 */

namespace app;


class Cart
{
    protected $products;

    public function __construct()
    {
        if(isset($_COOKIE['carrito'])){
            $this->products = unserialize($_COOKIE['carrito']);
        }else{
            $this->products = [];
        }
    }


    public function add(Producto $p,$qty)
    {
        if($p->getId() !== null ){//comprobo si manda la referencia y la cantidad por la query string
            if(array_key_exists($p->getId(),$this->products)){ //como es un array asociativo de tipo array('ref'=>cantidad ) comprobo si el la referencia existe en el indice de array_articles
                $this->products[$p->getId()] = $this->products[$p->getId()]+=$qty; //si existe le añado +1
            }else{//si no existe pongo el indice y la cantidad

                $this->products[$p->getId()] = $qty;
            }
        }
        //crear la cookie serializando el array de articulos
        setcookie('carrito',serialize($this->products),time() + (86400 * 30));
    }

    public function count()
    {
        $compt=0;
        if(!empty($this->products)){
            //contar valores del carrito que son cantidades
            foreach (array_values($this->products) as $cantidad) {
                $compt += $cantidad;
            }
        }
        return $compt;
    }

    public function total()
    {
        $nums = array_keys($this->products);
        $total = 0;
        $manager = new ProductoManager();
        if (empty($nums)) {
            echo 0;
        } else {
            foreach ($nums as $value) {
                if(($manager->getProduct($value)->getPrecioReducido()) !== null){
                    $total += $manager->getProduct($value)->getPrecioReducido()* $this->products[$manager->getProduct($value)->getId()];
                }else{
                    $total += $manager->getProduct($value)
                            ->getPrecio() * $this->products[$manager->getProduct($value)->getId()];

                }
                  }

            return $total;
        }
    }
    function getCrrito() {
        $manager = new ProductoManager();
        $ids = array_keys($this->products);
        $arry_products = [];

        foreach ($ids as $value) {
            $arry_products[] = $manager->getProduct($value);
        }
        return $arry_products;

    }

    public function updateQty(Producto $p,$qty){
        if (isset($this->products[$p->getId()])) {
            $this->products[$p->getId()] = $qty;
        }else{
            $this->products[$p->getId()] = 1;

        }
        setcookie('carrito',serialize($this->products),time() + (86400 * 30));

    }

    public function remove(Producto $p)
    {
        unset($this->products[$p->getId()]);
        setcookie('carrito',serialize($this->products),time() + (86400 * 30));

    }

    public function countProductSingle(Producto $p)
    {

        return (isset($this->products[$p->getId()])?$this->products[$p->getId()]:0);

    }

}