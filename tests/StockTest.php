<?php

use App\Models\Money;
use App\Models\Product;
use App\Models\Stock;

function addItemToStock($product): Stock
{
    $stock = new Stock();
    $stock->addProduct($product);
    return $stock;
}

test('Stock object should be created', function () {
    $stock = new Stock();

    expect($stock->getProducts())->toBe([]);
});

test('A product should be put into the stock', function () {
    $product = new Product('iPhone', 1, new Money(1435.34), 0.21);
    $stock = addItemToStock($product);
    $savedProduct = $stock->getProducts();

    expect($savedProduct[0])->toBe($product);
});

test('A specific product should be removed from stock', function () {
    $stock = new Stock();
    $products = [
        new Product('iPhone', 1, new Money(1435.34), 0.21),
        new Product('iPhone2', 1, new Money(1435.34), 0.21),
        new Product('iPhone3', 1, new Money(1435.34), 0.21),
    ];

    foreach ($products as $value) {
        $stock->addProduct($value);
    }

    $stock->removeProduct($products[1]);

    expect($stock->getProducts())->toBe([$products[0], $products[2]]);
});