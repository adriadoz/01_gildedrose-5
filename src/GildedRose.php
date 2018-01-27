<?php
declare(strict_types=1);
namespace MPWAR5\GildedRoseKata;

final class GildedRose
{
    private $item;
    private $itemName;
    private $quality;
    private $sellIn;
    private const MAX_QUALITY = 50;
    private const MIN_INCREMENT = 1;

    private function qualityUp(Item $item, $increment)
    {
        if ($this->canIncreaseQuality($item->getQuality())) {
            $item->setQuality($item->getQuality() + $increment);
        }
    }

    private function qualityDown(Item $item, $decrement)
    {
        if ($this->quality <= 0) return;
        $item->setQuality($this->quality - $decrement);
    }

    private function sellInDown(Item $item)
    {
        if ($this->sellIn <= 0) return;
        $item->setSellIn($this->sellIn - 1);
    }

    private function canIncreaseQuality($quality): bool
    {
        if($quality < $this::MAX_QUALITY) return true;
        return false;
    }

    public function updateQuality(
        Item ...$items
    ): void{
        array_map($this->updateItemQuality(), $items);
    }

    public function updateItemQuality(): callable
    {
        return function(Item $item):void {
            $agedBrieName = "Aged Brie";
            $backstagePassesName = "Backstage passes to a TAFKAL80ETC concert";
            $sulfurasName = "Sulfuras, Hand of Ragnaros";

            $this->item = $item;
            $this->itemName = $item->getName();
            $this->quality = $item->getQuality();
            $this->sellIn = $item->getSellIn();

            if ($this->itemName == $agedBrieName) {
                $this->qualityUp($item, 1);
            } else if ($this->itemName == $sulfurasName) {
                $item->setQuality($item->getQuality());
            } else if ($this->itemName == $backstagePassesName) {
                $this->qualityUp($item, $this::MIN_INCREMENT);
                if ($this->sellIn == 0) {
                    $item->setQuality(0);
                } else if ($this->sellIn <= 5) {
                    $this->qualityUp($item, 2);
                } else if ($this->sellIn <= 10) {
                    $this->qualityUp($item, $this::MIN_INCREMENT);
                }
            } else {
                $this->qualityDown($item, $this::MIN_INCREMENT);
            }
            $this->sellInDown($item);
        };
    }
}
