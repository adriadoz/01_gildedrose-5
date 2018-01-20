<?php

namespace MPWAR5\GildedRoseKata;

class GildedRose {

	public static function updateQuality(
		$items
	) {
		for ($i = 0; $i < count($items); $i++) {
			$itemName = $items[$i]->getName();
			$agedBrieName = "Aged Brie";
			$backstagePassesName = "Backstage passes to a TAFKAL80ETC concert";
			$sulfurasName = "Sulfuras, Hand of Ragnaros";
			if (($agedBrieName != $itemName) && ($backstagePassesName != $itemName)) {
				if ($items[$i]->getQuality() > 0) {
					if ($sulfurasName != $itemName) {
						$items[$i]->setQuality($items[$i]->getQuality() - 1);
					}
				}
			} else {
				if ($items[$i]->getQuality() < 50) {
					$items[$i]->setQuality($items[$i]->getQuality() + 1);
					if ($backstagePassesName == $itemName) {
						if ($items[$i]->getSellIn() < 11) {
							if ($items[$i]->getQuality() < 50) {
								$items[$i]->setQuality($items[$i]->getQuality() + 1);
							}
						}
						if ($items[$i]->getSellIn() < 6) {
							if ($items[$i]->getQuality() < 50) {
								$items[$i]->setQuality($items[$i]->getQuality() + 1);
							}
						}
					}
				}
			}

			if ($sulfurasName != $itemName) {
				$items[$i]->setSellIn($items[$i]->getSellIn() - 1);
			}

			if ($items[$i]->getSellIn() < 0) {
				if ($agedBrieName != $itemName) {
					if ($backstagePassesName != $itemName) {
						if ($items[$i]->getQuality() > 0) {
							if ($sulfurasName != $itemName) {
								$items[$i]->setQuality($items[$i]->getQuality() - 1);
							}
						}
					} else {
						$items[$i]->setQuality($items[$i]->getQuality() - $items[$i]->getQuality());
					}
				} else {
					if ($items[$i]->getQuality() < 50) {
						$items[$i]->setQuality($items[$i]->getQuality() + 1);
					}
				}
			}
		}
	}
}

?>
