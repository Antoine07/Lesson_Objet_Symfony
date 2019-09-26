<?php namespace App;

class Cart
{
    private $tva;
    /**
     * @var array
     */
    private $storage = null;

    public function __construct(Storable $storage, float $tva = 0.2)
    {
        $this->storage = $storage;
        $this->tva = $tva;
    }

    /**
     * @param Product $product
     * @param $quantity
     * @return $this
     */
    public function buy(Product $product, int $quantity)
    {
        $total =  $product->getPrice() * $quantity * ( 1 + $this->tva) ;
        $this->storage->setValue($product->getName(), $total);

        return $this;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function restore(Product $product)
    {

    }

    /**
     * sum cart product
     * @return float
     */
    public function total():float
    {
    }

    /**
     * reset cart
     */
    public function reset():void
    {
    }


}