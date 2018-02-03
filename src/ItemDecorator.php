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
        $this->itemQuality = $this->item->getQuality();
    }

    public function updateItem(): void
    {
        if($this->itemQuality >= 0 && $this->itemQuality < 50)
        {
            $this->updateQuality();
        }
        if($this->item->getSellIn() > 0)
        {
            $this->decreaseSellIn();
        }
    }

    public function getName(): string
    {
        return $this->item->getName();
    }

    public function getQuality(): int
    {
        return $this->item->getQuality();
    }

    public function getSellIn(): int
    {
        return $this->item->getSellIn();
    }

    protected function updateQuality(): void
    {
        var_dump($this->item->getQuality());
        $this->item->setQuality($this->item->getQuality() - 1);
    }

    protected function decreaseSellIn(): void
    {
        $this->item->setSellIn($this->item->getSellIn() - 1);
    }
}