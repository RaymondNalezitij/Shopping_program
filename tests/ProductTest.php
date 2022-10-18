<?php

use \App\Repositories\ProductRepository;
use \App\Repositories\MoneyRepository;

test('Product object should be created', function () {
    $product = new ProductRepository('iPhone', 1, new MoneyRepository(1435.34), 0.21);

    expect($product->getName())->toBe('iPhone');
    expect($product->getAvailable())->toBe(1);
    expect($product->getPrice()->getEuros())->toBe(1435);
    expect($product->getPrice()->getCents())->toBe(34);
    expect($product->getVatRate())->toBe(0.21);
});