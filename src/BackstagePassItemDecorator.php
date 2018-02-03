<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class BackstagePassItemDecorator extends ItemDecorator
{
    private $sellIn;

    protected function updateQuality(): void
    {
        $this->sellIn = $this->item->getSellIn();
        $this->item->setQuality($this->item->getQuality() + 1);
        if ($this->sellIn == 0) {
            $this->item->setQuality(0);
        } elseif
        ($this->sellIn <= 5) {
            $this->item->setQuality($this->item->getQuality() + 2);
        } elseif
        ($this->sellIn <= 10) {
            $this->item->setQuality($this->item->getQuality() + 1);
        }
    }
}