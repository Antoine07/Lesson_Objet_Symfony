<?php namespace App;

// Storable c'est une interface => contrat pour la classe StorageArray
class StorageArray implements Storable
{
    private $storage = [];

    public function setValue(string $name, float $price)
    {
        if (array_key_exists($name, $this->storage) == true)
            $this->storage[$name] += $price;
        else
            $this->storage[$name] = $price;
    }
}
