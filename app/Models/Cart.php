<?php

namespace App\Models;

class Cart implements CartInterface
{
    private array $cart;

    public function __construct()
    {
        $this->cart = [];
    }

    public function addProduct(ProductInterface $product): CartInterface
    {
        $this->cart[] = $product;

        return $this;
    }

    public function removeProduct(ProductInterface $product): CartInterface
    {
        foreach ($this->cart as $i => $value) {
            if ($value == $product) {
                array_splice($this->cart, $i, 1);
            }
        }

        return $this;
    }

    public function getProducts(): array
    {
        return $this->cart;
    }

    public function getSubtotal(): MoneyInterface
    {
        $sumCents = 0;
        $sumEuros = 0;
        foreach ($this->cart as $value) {
            $cents = $value->getPrice()->getCents();
            $euros = $value->getPrice()->getEuros();
            $sumCents = $sumCents + $cents * $value->getAvailable();
            $sumEuros = $sumEuros + $euros * $value->getAvailable();
        }

        return new Money($sumEuros + $sumCents / 100);
    }

    public function getVatAmount(): MoneyInterface
    {
        $vatRates = [];
        foreach ($this->cart as $value) {
            $vatRates[] = $value->getVatRate();
        }
        $averageVatRate = array_sum($vatRates)/count($vatRates);

        $productVAT = ($this->getSubtotal()->getEuros() * $averageVatRate) + (round($this->getSubtotal()->getCents() / 100 * $averageVatRate, 2));

        return new Money($productVAT);
    }

    public function getTotal(): MoneyInterface
    {
        $totalEuro = $this->getSubtotal()->getEuros() + $this->getVatAmount()->getEuros();
        $totalCents = $this->getSubtotal()->getCents() + $this->getVatAmount()->getCents();
        return new Money($totalEuro + $totalCents / 100);
    }
}