<?php

use \App\Repositories\MoneyRepository;

test('Money object should be created', function () {
    $money = new MoneyRepository(1435.34);

    expect($money->getEuros())->toBe(1435);
    expect($money->getCents())->toBe(34);
});