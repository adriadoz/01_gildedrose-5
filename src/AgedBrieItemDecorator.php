<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class AgedBrieItemDecorator extends ItemDecorator
{
    private $itemDecorator;

    public function __construct(ItemDecorator $itemDecorator)
    {
        $this->itemDecorator = $itemDecorator;
    }

    protected function updateQuality(): void
    {
        $this->itemDecorator->setQuality($this->item->getQuality() + 1);
    }
}