<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class AgedBrieItemDecorator extends ItemDecorator
{
    protected function updateQuality(): void
    {
        $this->item->setQuality($this->item->getQuality() + 1);
    }
}