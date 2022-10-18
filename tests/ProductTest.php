<?php

use \App\Models\Product;
use \App\Models\Money;

test('Product object should be created', function () {
    $product = new Product('iPhone', 1, new Money(1435.34), 0.21);

    expect($product->getName())->toBe('iPhone');
    expect($product->getAvailable())->toBe(1);
    expect($product->getPrice()->getEuros())->toBe(1435);
    expect($product->getPrice()->getCents())->toBe(34);
    expect($product->getVatRate())->toBe(0.21);
});