<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

final class SulfurasItemDecorator extends ItemDecorator
{
    private $itemDecorator;

    public function __construct(ItemDecorator $itemDecorator)
    {
        $this->itemDecorator = $itemDecorator;
    }

    protected function updateQuality(): void
    {
        return;
    }
}