<?php

namespace App\Models;

class Product implements ProductInterface
{
    private string $name;
    private int $available;
    private MoneyInterface $price;
    private float $vat;

    public function __construct(string $name, int $available, MoneyInterface $price, float $vat)
    {
        $this->name = $name;
        $this->available = $available;
        $this->price = $price;
        $this->vat = $vat;
    }

    public function setName(string $name): ProductInterface
    {
        // TODO: Implement setName() method.
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAvailable(int $available): ProductInterface
    {
        // TODO: Implement setAvailable() method.
    }

    public function getAvailable(): int
    {
        return $this->available;
    }

    public function setPrice(MoneyInterface $price): ProductInterface
    {
        // TODO: Implement setPrice() method.
    }

    public function getPrice(): MoneyInterface
    {
        return $this->price;
    }

    public function setVatRate(float $vat): ProductInterface
    {
        // TODO: Implement setVatRate() method.
    }

    public function getVatRate(): float
    {
        return $this->vat;
    }
}