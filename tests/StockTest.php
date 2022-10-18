<?php

use \App\Models\Product;
use \App\Models\Money;
use \App\Models\Stock;

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

test('Product object should be put into the stock object', function () {
    $product = new Product('iPhone', 1, new Money(1435.34), 0.21);
    $stock=addItemToStock($product);
    $savedProduct = $stock->getProducts();

    expect($savedProduct[0])->toBe($product);
});

test('Stock object should be deleted', function () {
    $product = new Product('iPhone', 1, new Money(1435.34), 0.21);
    $stock=addItemToStock($product);
    $stock->removeProduct($product);

    expect($stock->getProducts())->toBe([]);
});