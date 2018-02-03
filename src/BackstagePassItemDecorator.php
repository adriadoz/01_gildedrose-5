<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class BackstagePassItemDecorator extends ItemDecorator
{
    private $itemDecorator;
    private $sellIn;

    public function __construct(ItemDecorator $itemDecorator)
    {
        $this->itemDecorator = $itemDecorator;
    }

    protected function updateQuality(): void
    {
        $this->sellIn = $this->itemDecorator->item->getSellIn();
        if ($this->sellIn == 0) {
            $this->itemDecorator->setQuality(0);
        } elseif
        ($this->sellIn <= 5) {
            $this->itemDecorator->setQuality($this->item->getQuality() + 3);
        } elseif
        ($this->sellIn <= 10) {
            $this->itemDecorator->setQuality($this->item->getQuality() + 2);
        }
    }
}