<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class GildedRose
{
    public function updateQuality(
        ItemDecorator ...$items
    ): void
    {
        foreach ($items as $item){
            $item->updateItem();
        }
    }
}