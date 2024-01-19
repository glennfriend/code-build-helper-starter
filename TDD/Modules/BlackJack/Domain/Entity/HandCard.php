<?php

namespace Modules\BlackJack\Domain\Entity;

/*
計算出手牌(hand)的點數(point)

點數計算規則
2-10 的點數(point)為牌面數字
J、Q、K 每張為 10 點
A 可以是 1 點或 11 點,取决於哪個值能讓手中牌點數最接近 21 點但不超過。
----

OCP
Calculator
Poker-Dictionary
發牌 -> 我手上的牌
計算所有的可能, 要小於等於 21, 不能超過
超過也要計算, 超過時 A 為 1
"A,10,3"

*/

class HandCard
{
    public function calculator(array $cards): int
    {
        $resultPoint = 0;
        $expectAArray = [];
        $Acards = [];
        foreach ($cards as $card) {
            if ($card == 'A') {
                $Acards [] = $card;
            } else {
                $expectAArray[] = $card;
            }
        }

        foreach ($expectAArray as $card) {

            switch ($card) {
                case 'J':
                case 'Q':
                case 'K':
                    $resultPoint += 10;
                    break;
                default:
                    $resultPoint += $card;
            }
        }

        foreach ($Acards as $card) {

            if ($resultPoint > 21 || count($cards) > 2) {
                $resultPoint += 1;
            } else {
                $resultPoint += 11;
            }
        }
        return $resultPoint;
    }
}
