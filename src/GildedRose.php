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

    private function qualityUp(Item $item, $increment)
    {
        if ($item->getQuality() < $this::MAX_QUALITY) {
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

    public function updateQuality(
        Item ...$items
    ): void{
        foreach($items as $item){
            $this->updateItemQuality($item);
        }
    }

    public function updateItemQuality(Item $item): void
    {
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
            $this->qualityUp($item,1);
            if ($this->sellIn == 0) {
                $item->setQuality(0);
            } else if ($this->sellIn <= 5) {
                $this->qualityUp($item,2);
            } else if ($this->sellIn <= 10) {
                $this->qualityUp($item,1);
            }
        } else {
            $this->qualityDown($item,1);
        }
        $this->sellInDown($item);
    }
}
