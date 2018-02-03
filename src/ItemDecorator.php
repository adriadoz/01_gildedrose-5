<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

class ItemDecorator
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateItem(): void
    {
        $this->updateQuality();
        $this->decreaseSellIn();
    }

    public function updateQuality(): void
    {
        $this->item->setQuality($this->item->getQuality() - 1);
    }

    public function decreaseSellIn(): void
    {
        $this->item->setSellIn($this->item->getSellIn() - 1);
    }
}

class AgedBrieItemDecorator extends ItemDecorator
{
    private $itemDecorator;

    public function __construct(ItemDecorator $itemDecorator)
    {
        $this->$itemDecorator = $itemDecorator;
    }

    public function updateQuality(): void
    {
        $this->itemDecorator->setQuality($this->item->getQuality() + 1);
    }
}

class SulfurasItemDecorator extends ItemDecorator
{
    private $itemDecorator;

    public function __construct(ItemDecorator $itemDecorator)
    {
        $this->itemDecorator = $itemDecorator;
    }

    public function updateQuality(): void
    {
        return;
    }
}

class BackstagePassItemDecorator extends ItemDecorator
{
    private $itemDecorator;
    private $sellIn;

    public function __construct(ItemDecorator $itemDecorator)
    {
        $this->itemDecorator = $itemDecorator;
    }

    public function updateQuality(): void
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