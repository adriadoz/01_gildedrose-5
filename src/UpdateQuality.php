<?php

namespace MPWAR5\GildedRoseKata;

final class UpdateQuality
{
    private $itemName;
    private $quality;
    private $sellIn;
    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;
    private const MIN_INCREMENT = 1;
    private const MAX_INCREMENT = 2;
    private const MIN_SELLIN = 0;
    private const MID_SELLIN = 5;
    private const MAX_SELLIN = 10;

    private function qualityUp(Item $item, int $increment): void
    {
        if ($this->canIncreaseQuality($item->getQuality())) {
            $item->setQuality($item->getQuality() + $increment);
        }
    }

    private function qualityDown(Item $item, int $decrement): void
    {
        if ($item->getQuality() > 0) {
            $item->setQuality($item->getQuality() - $decrement);
        }
    }

    private function sellInDown(Item $item): void
    {
        if ($this->sellIn <= 0) return;
        $item->setSellIn($this->sellIn - 1);
    }

    private function canIncreaseQuality(int $quality): bool
    {
        if ($quality < $this::MAX_QUALITY) return true;
        return false;
    }

    public function __invoke(Item $item): void
    {
        $agedBrieName = "Aged Brie";
        $backstagePassesName = "Backstage passes to a TAFKAL80ETC concert";
        $sulfurasName = "Sulfuras, Hand of Ragnaros";

        $this->itemName = $item->getName();
        $this->sellIn = $item->getSellIn();

        if ($this->itemName == $agedBrieName) {
            $this->qualityUp($item, $this::MIN_INCREMENT);
        } else if ($this->itemName == $sulfurasName) {
            $item->setQuality($item->getQuality());
        } else if ($this->itemName == $backstagePassesName) {
            $this->qualityUp($item, $this::MIN_INCREMENT);
            if ($this->sellIn == $this::MIN_SELLIN) {
                $item->setQuality($this::MIN_QUALITY);
            } else if ($this->sellIn <= $this::MID_SELLIN) {
                $this->qualityUp($item, $this::MAX_INCREMENT);
            } else if ($this->sellIn <= $this::MAX_SELLIN) {
                $this->qualityUp($item, $this::MIN_INCREMENT);
            }
        } else {
            $this->qualityDown($item, $this::MIN_INCREMENT);
        }
        $this->sellInDown($item);
    }
}