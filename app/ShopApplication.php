<?php

namespace App;

use App\Models\Cart;
use App\Models\Money;
use App\Models\Product;
use App\Models\Stock;

class ShopApplication
{
    public static function printMenu(Stock $stock, Cart $cart): void
    {
        echo "Please choose an option:\n";
        echo "1. Quit\n";
        echo "2. Add product to stock\n";
        if (count($stock->getProducts()) > 0) {
            echo "3. Edit item in stock\n";
            echo "4. Remove item from stock\n";
            echo "5. Add product to cart\n";
            if (count($cart->getProducts()) > 0) {
                echo "6. Remove product from cart\n";
                echo "7. View cart\n";
            }
        }
    }

    public static function addProduct(Stock $stock): void
    {
        $name = readline("Input product name: \n");
        $available = readline("Input available product quantity: \n");
        $price = readline("Input product price: \n");
        $vat = readline("Input product vat percentage: \n");
        $stock->addProduct(new Product($name, $available, new Money($price), $vat));
    }

    public static function editProduct(Stock $stock): void
    {
        $product = null;

        do {
            $productName = readline("Input the name of the product that you wish to modify: \n");
            foreach ($stock->getProducts() as $value) {
                if ($value->getName() == $productName) {
                    $product = $value;
                }
            }
            if ($product == null) {
                echo "Product with such name does not exist\n";
            }
        } while ($product == null);

        echo "{$product->getName()} {$product->getAvailable()} {$product->getPrice()->getEuros()}.{$product->getPrice()->getCents()} {$product->getVatRate()}\n";

        $option = readline("What property do you wish to modify (name, quantity, price, vat): \n");
        if ($option == "name") {
            $name = readline("What name do you wish to assign to the product? \n");
            $product->setName($name);
        } else if ($option == "quantity") {
            $quantity = readline("What quantity do you wish to assign to the product? \n");
            $product->setAvailable($quantity);
        } else if ($option == "price") {
            $price = readline("What price do you wish to assign to the product? \n");
            $product->setPrice(new Money((float)$price));
        } else if ($option == "vat") {
            $vat = readline("What vat do you wish to assign to the product? \n");
            $product->setVatRate($vat);
        } else {
            echo "Property does not exist\n";
        }
    }

    public static function removeProduct(Stock $stock): void
    {
        foreach ($stock->getProducts() as $value) {
            echo "Stock:\n";
            echo "{$value->getName()}\n";
        }
        echo "\n";
        $name = readline("Input the name of the product that you wish to remove: \n");
        foreach ($stock->getProducts() as $value) {
            if ($value->getName() == $name) {
                $stock->removeProduct($value);
            }
        }
    }

    public static function addProductToCart(Stock $stock, Cart $cart): void
    {
        $product = null;
        do {
            $productName = readline("What product would you like to add to cart: \n");
            foreach ($stock->getProducts() as $value) {
                if ($value->getName() == $productName) {
                    $product = $value;
                }
            }
            if ($product == null) {
                echo "Product with such name does not exist\n";
            }
        } while ($product == null);
        do {
            $purchaseQuantity = readline("How much of that product would you like to add to cart: \n");
            $amountInStock = $product->getAvailable();
            if ($purchaseQuantity <= $amountInStock) {
                $product->setAvailable($purchaseQuantity);
                $cart->addProduct(new Product($product->getName(), $product->getAvailable(), $product->getPrice(), $product->getVatRate()));
                $product->setAvailable($amountInStock - $purchaseQuantity);
            } else {
                echo "Not enough product in stock\n";
            }
        } while ($purchaseQuantity > $amountInStock);
    }

    public static function removeItemFromCart(Stock $stock, Cart $cart): void
    {
        $productCart = null;
        $productStock = null;
        do {
            $productName = readline("What product would you like to remove from cart: \n");
            foreach ($cart->getProducts() as $value) {
                if ($value->getName() == $productName) {
                    $productCart = $value;
                }
            }
            if ($productCart == null) {
                echo "Product with such name does not exist\n";
            }
        } while ($productCart == null);
        $removeQuantity = readline("How much of that product would you like to remove from cart: \n");
        foreach ($stock->getProducts() as $value) {
            if ($value->getName() == $productCart->getName()) {
                $productStock = $value;
            }
        }
        $cartQuantity = $productCart->getAvailable();
        $stockQuantity = $productStock->getAvailable();
        if ($cartQuantity == $removeQuantity) {
            $cart->removeProduct($productCart);
            $productStock->setAvailable($stockQuantity + $removeQuantity);
        } else if ($cartQuantity > $removeQuantity) {
            $productCart->setAvailable($cartQuantity - $removeQuantity);
            $productStock->setAvailable($stockQuantity + $removeQuantity);
        } else {
            echo "Not enough products in cart!\n";
        }
    }

    public static function getCartInfo(Cart $cart): void
    {
        echo "Cart:\n";
        foreach ($cart->getProducts() as $value) {
            echo "\nName: {$value->getName()}\nQuantity in cart: {$value->getAvailable()}\n";
        }
        echo "\nCart subtotal: {$cart->getSubtotal()->getEuros()}.{$cart->getSubtotal()->getCents()}\n";
        echo "Total VAT: {$cart->getVatAmount()->getEuros()}.{$cart->getVatAmount()->getCents()}\n";
        echo "Cart total: {$cart->getTotal()->getEuros()}.{$cart->getTotal()->getCents()}\n\n";
    }
}