<?php

namespace App\Repositories;

class ProductRepository implements ProductInterface {

    public function setName(string $name): ProductInterface
    {
        // TODO: Implement setName() method.
    }

    public function getName(): string
    {
        // TODO: Implement getName() method.
    }

    public function setAvailable(int $available): ProductInterface
    {
        // TODO: Implement setAvailable() method.
    }

    public function getAvailable(): int
    {
        // TODO: Implement getAvailable() method.
    }

    public function setPrice(MoneyInterface $price): ProductInterface
    {
        // TODO: Implement setPrice() method.
    }

    public function getPrice(): MoneyInterface
    {
        // TODO: Implement getPrice() method.
    }

    public function setVatRate(float $vat): ProductInterface
    {
        // TODO: Implement setVatRate() method.
    }

    public function getVatRate(): float
    {
        // TODO: Implement getVatRate() method.
    }
}