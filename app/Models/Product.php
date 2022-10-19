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
        if ($vat >= 1){
            $this->vat = $vat/100;
        } else {
            $this->vat = $vat;
        }
    }

    public function setName(string $name): ProductInterface
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAvailable(int $available): ProductInterface
    {
        $this->available = $available;

        return $this;
    }

    public function getAvailable(): int
    {
        return $this->available;
    }

    public function setPrice(MoneyInterface $price): ProductInterface
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): MoneyInterface
    {
        return $this->price;
    }

    public function setVatRate(float $vat): ProductInterface
    {
        $this->vat = $vat;

        return $this;
    }

    public function getVatRate(): float
    {
        return $this->vat;
    }
}