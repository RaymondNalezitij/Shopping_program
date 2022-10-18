<?php

use \App\Models\Money;

test('Money object should be created', function () {
    $money = new Money(1435.34);

    expect($money->getEuros())->toBe(1435);
    expect($money->getCents())->toBe(34);
});