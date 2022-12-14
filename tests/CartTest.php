<?php

use App\Models\Cart;
use App\Models\Money;
use App\Models\Product;

function generateProductsArray(): array
{
    return [
        new Product('iPhone', 5, new Money(1435.34), 0.21),
        new Product('samsung', 1, new Money(1000.40), 0.21),
        new Product('huawei', 7, new Money(1345.20), 0.21),
    ];
}

function addProductsToCart(array $products, Cart $cart): void
{
    foreach ($products as $value) {
        $cart->addProduct($value);
    }
}

test('Cart object should be created', function () {
    $cart = new Cart();

    expect($cart->getProducts())->toBe([]);
});

test('A product should be added to cart', function () {
    $cart = new Cart();
    $product = new Product('iPhone', 1, new Money(1435.34), 0.21);
    $cart->addProduct($product);
    $savedProduct = $cart->getProducts();

    expect($savedProduct[0])->toBe($product);
});

test('A specific product should be removed from cart', function () {
    $cart = new Cart();
    $products = generateProductsArray();
    addProductsToCart($products, $cart);

    $cart->removeProduct($products[1]);

    expect($cart->getProducts())->toBe([$products[0], $products[2]]);
});

test('Should return subtotal price of all the products in cart', function () {
    $cart = new Cart();
    $products = generateProductsArray();
    addProductsToCart($products, $cart);

    expect($cart->getSubtotal()->getEuros())->toBe(17593);
    expect($cart->getSubtotal()->getCents())->toBe(50);
});

test('Should return VAT of all the products in cart', function () {
    $cart = new Cart();
    $products = generateProductsArray();
    addProductsToCart($products, $cart);

    expect($cart->getVatAmount()->getEuros())->toBe(3694);
    expect($cart->getVatAmount()->getCents())->toBe(64);
});

test('Should return total price (including VAT) of all the products in cart', function () {
    $cart = new Cart();
    $products = generateProductsArray();
    addProductsToCart($products, $cart);

    expect($cart->getTotal()->getEuros())->toBe(21288);
    expect($cart->getTotal()->getCents())->toBe(14);
});