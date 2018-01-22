<?php
declare(strict_types=1);
namespace MPWAR5\GildedRoseKata;

class GildedRose
{
    private $item;
    private $itemName;
    private $quality;
    private $sellIn;
    private $maxQuality = 50;

    private function qualityUp($increment)
    {
        if ($this->quality < $this->maxQuality) {
            $this->item->setQuality($this->quality + $increment);
        }
    }

    private function qualityDown($decrement)
    {
        if ($this->quality <= 0) return;
        $this->item->setQuality($this->quality - $decrement);
    }

    private function sellInDown()
    {
        if ($this->sellIn <= 0) return;
        $this->item->setQuality($this->quality - 1);
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
            $this->qualityUp(1);
        } else if ($this->itemName == $sulfurasName) {
            $this->item->setQuality($this->item->getQuality());
        } else if ($this->itemName == $backstagePassesName) {
            if ($this->sellIn == 0) {
                $this->item->setQuality(0);
            } else if ($this->sellIn <= 5) {
                $this->qualityUp(3);
            } else if ($this->sellIn <= 10) {
                $this->qualityUp(2);
            }
        } else {
            $this->qualityDown(1);
        }
        $this->sellInDown();
    }
}
