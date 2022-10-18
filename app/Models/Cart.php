<?php

namespace App\Models;

class Cart implements CartInterface
{
    public function addProduct(ProductInterface $product): CartInterface
    {
        // TODO: Implement addProduct() method.
    }

    public function removeProduct(ProductInterface $product): CartInterface
    {
        // TODO: Implement removeProduct() method.
    }

    public function getProducts(): array
    {
        // TODO: Implement getProducts() method.
    }

    public function getSubtotal(): MoneyInterface
    {
        // TODO: Implement getSubtotal() method.
    }

    public function getVatAmount(): MoneyInterface
    {
        // TODO: Implement getVatAmount() method.
    }

    public function getTotal(): MoneyInterface
    {
        // TODO: Implement getTotal() method.
    }
}