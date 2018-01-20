<?php

namespace MPWAR5\GildedRoseKata;

class GildedRose {
	
	   private $item;
	   private $itemName;
	   private $quality;
	   private $sellIn;
	   private $maxQuality = 50;
	
	   private function qualityUp($increment)
	   {
		   if ($this->quality < $this->maxQuality) {
			   $this->item->setQuality( $this->quality + $increment);
		   }
	   }
	
	   private function qualityDown($decrement)
	   {
		   if ($this->quality <= 0) return;
		   $this->item->setQuality( $this->quality - $decrement );
	   }
	
	   private function sellInDown()
	   {
		   if ($this->sellIn <= 0) return;
		   $this->item->setQuality( $this->quality - 1 );
	   }
	
	   public static function updateQuality(
		   GildedRose $gildedRoseInstance,
		   $items
	   ) {
		   for ($i = 0; $i < count($items); $i++) {
			   $agedBrieName = "Aged Brie";
			   $backstagePassesName = "Backstage passes to a TAFKAL80ETC concert";
			   $sulfurasName = "Sulfuras, Hand of Ragnaros";

			   $gildedRoseInstance->item = $items[$i];
			   $gildedRoseInstance->itemName = $items[$i]->getName();
			   $gildedRoseInstance->quality = $items[$i]->getQuality();
			   $gildedRoseInstance->sellIn = $items[$i]->getSellIn();
	
			   if ($gildedRoseInstance->itemName == $agedBrieName) {
				   $gildedRoseInstance->qualityUp(1);
			   }
	
			   else if ($gildedRoseInstance->itemName == $sulfurasName) {
				   continue;
			   }
	
			   else if ($gildedRoseInstance->itemName == $backstagePassesName) {
				   if($gildedRoseInstance->sellIn == 0) {
					   $gildedRoseInstance->item.setQuality(0);
				   }
				   else if($gildedRoseInstance->sellIn <= 5) {
					   $gildedRoseInstance->qualityUp(3);
				   }
				   else if($gildedRoseInstance->sellIn <= 10) {
					   $gildedRoseInstance->qualityUp(2);
				   }
			   }
			   else {
				   $gildedRoseInstance->qualityDown(1);
			   }
			   $gildedRoseInstance->sellInDown();
		   }
	   }
   }

?>
