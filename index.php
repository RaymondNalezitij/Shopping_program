<?php

use App\Models\Cart;
use App\Models\Stock;
use App\ShopApplication;

require_once 'vendor/autoload.php';
$stock = new Stock;
$cart = new Cart;

do {
    ShopApplication::printMenu($stock, $cart);
    $userInput = readline();

    if ($userInput == 2) {
        ShopApplication::addProduct($stock);
    }
    if (count($stock->getProducts()) > 0) {
        if ($userInput == 3) {
            ShopApplication::editProduct($stock);
        } else if ($userInput == 4) {
            ShopApplication::removeProduct($stock);
        } else if ($userInput == 5) {
            ShopApplication::addProductToCart($stock, $cart);
        } else if ($userInput == 6) {
            ShopApplication::removeItemFromCart($stock, $cart);
        } else if ($userInput == 7) {
            ShopApplication::getCartInfo($cart);
        }
    }

} while ($userInput != 1);