<?php

namespace App\Models;

class Money implements MoneyInterface
{
    private int $euros;
    private int $cents;

    public function __construct(float $price)
    {
        if(str_contains($price,'.')){
            list($int, $dec) = explode('.', $price);
            $this->euros = $int;
            if ($dec < 10) {
                $dec = $dec * 10;
            }
            $this->cents = $dec;
        } else {
            $this->euros = $price;
            $this->cents = 0;
        }
    }

    public function setCents(int $cents): MoneyInterface
    {
        // TODO: Implement setCents() method.
    }

    public function getCents(): int
    {
        return $this->cents;
    }

    public function setEuros(int $euros): MoneyInterface
    {
        // TODO: Implement setEuros() method.
    }

    public function getEuros(): int
    {
        return $this->euros;
    }
}