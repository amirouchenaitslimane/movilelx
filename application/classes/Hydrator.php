<?php
/**
 * Created by PhpStorm.
 * User: Ami
 * Date: 30/11/2018
 * Time: 19:04
 */

namespace app;


trait Hydrator
{
    public function hydrate($data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (is_callable([$this, $method]))
            {
                $this->$method($value);
            }
        }
    }
}