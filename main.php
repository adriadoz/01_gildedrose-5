<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'vendor/autoload.php';

$items = array();

$items []= new MPWAR5\GildedRoseKata\Item("+5 Dexterity Vest", 10, 20);
$items []= new MPWAR5\GildedRoseKata\Item("Aged Brie", 2, 0);
$items []= new MPWAR5\GildedRoseKata\Item("Elixir of the Mongoose", 5, 7);
$items []= new MPWAR5\GildedRoseKata\Item("Sulfuras, Hand of Ragnaros", 0, 80);
$items []= new MPWAR5\GildedRoseKata\Item("Backstage passes to a TAFKAL80ETC concert", 15, 20);
$items []= new MPWAR5\GildedRoseKata\Item("Conjured Mana Cake", 3, 6);

$gildedRose = new MPWAR5\GildedRoseKata\GildedRose();
MPWAR5\GildedRoseKata\GildedRose::updateQuality($gildedRose, $items);

foreach ($items as $item) {
	echo "Item: {$item->name}, Quality: {$item->quality}, SellIn: {$item->sellIn}\n";
}

?>
