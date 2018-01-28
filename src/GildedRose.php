<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class GildedRose
{
    public function updateQuality(
        Item ...$items
    ): void
    {
        $updater = new UpdateQuality();
        array_map($updater, $items);
    }


}