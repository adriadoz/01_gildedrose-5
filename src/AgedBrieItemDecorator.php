<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class AgedBrieItemDecorator extends ItemDecorator
{
    protected const MIN_INCREMENT = 1;

    protected function updateQuality(): void
    {
        $this->item->setQuality($this->item->getQuality() + $this::MIN_INCREMENT);
    }
}