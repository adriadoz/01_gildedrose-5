<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class BackstagePassItemDecorator extends ItemDecorator
{
    private $sellIn;
    protected const MIN_INCREMENT = 1;
    protected const MIN_SELLIN = 0;
    protected const MID_SELLIN = 5;
    protected const MAX_SELLIN = 10;



    protected function updateQuality(): void
    {
        $this->sellIn = $this->item->getSellIn();
        $this->item->setQuality($this->item->getQuality() + $this::MIN_INCREMENT);
        if ($this->sellIn == $this::MIN_SELLIN) {
            $this->item->setQuality($this::MIN_SELLIN);
        } elseif
        ($this->sellIn <= $this::MID_SELLIN) {
            $this->item->setQuality($this->item->getQuality() + 2*$this::MIN_INCREMENT);
        } elseif
        ($this->sellIn <= $this::MAX_SELLIN) {
            $this->item->setQuality($this->item->getQuality() + $this::MIN_INCREMENT);
        }
    }
}