<?php
declare(strict_types=1);

namespace MPWAR5\GildedRoseKata;

class ItemDecorator
{
    protected $item;
    private $itemQuality;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function updateItem(): void
    {
        var_dump($this->item->getQuality());
        $this->itemQuality = $this->item->getQuality();
        if($this->itemQuality > 0 && $this->itemQuality < 50)
        {
            $this->updateQuality();
        }
        if($this->item->getSellIn() > 0)
        {
            $this->decreaseSellIn();
        }
    }

    protected function updateQuality(): void
    {
        $this->item->setQuality($this->item->getQuality() - 1);
    }

    protected function decreaseSellIn(): void
    {
        $this->item->setSellIn($this->item->getSellIn() - 1);
    }
}