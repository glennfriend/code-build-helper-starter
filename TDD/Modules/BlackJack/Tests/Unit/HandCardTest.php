<?php

use Modules\BlackJack\Domain\Entity\HandCard;

it('can calculator poker point', function () {
    $handCards = new HandCard();
    $points = $handCards->calculator([2, 3, 4]);
    expect($points)->toBe(9);
});
it('can calculator J Q K', function () {
    $handCards = new HandCard();
    $points = $handCards->calculator(['J', 'Q', 'K']);
    expect($points)->toBe(30);
});
it('can calculator A Q', function () {
    $handCards = new HandCard();
    $points = $handCards->calculator(['A', 'Q']);
    expect($points)->toBe(21);
});
it('can calculator A J', function () {
    $handCards = new HandCard();
    $points = $handCards->calculator(['A', 'J']);
    expect($points)->toBe(21);
});
it('can calculator A K', function () {
    $handCards = new HandCard();
    $points = $handCards->calculator(['A', 'K']);
    expect($points)->toBe(21);
});
it('can calculator A K K', function () {
    $handCards = new HandCard();
    $points = $handCards->calculator(['A', 'K', 'K']);
    expect($points)->toBe(21);
});
it('can calculator A A K', function () {
    $handCards = new HandCard();
    $points = $handCards->calculator(['A', 'A', 'K']);
    expect($points)->toBe(12);
});
/*
it('can calculator A 2 2', function () {
    $handCards = new HandCards();
    $points = $handCards->calculator(['A', '2', '2']);
    expect($points)->toBe(15);
});
*/
