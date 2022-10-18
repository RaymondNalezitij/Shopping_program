<?php

namespace App\Models;

class Stock implements StockInterface
{
    private array $stock;

    public function __construct()
    {
        $this->stock = [];
    }

    public function addProduct(ProductInterface $product): StockInterface
    {
        $this->stock[] = $product;

        return $this;
    }

    public function removeProduct(ProductInterface $product): StockInterface
    {
        foreach ($this->stock as $i => $value) {
            if ($value == $product) {
                array_splice($this->stock, $i, 1);
            }
        }

        return $this;
    }

    public function getProducts(): array
    {
        return $this->stock;
    }
}