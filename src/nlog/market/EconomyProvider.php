<?php


namespace nlog\market;


use nlog\market\money\MoneyProvider;
use onebone\economyapi\EconomyAPI;

class EconomyProvider extends MoneyProvider {

	/** @var int[] */
	private $lists = [];

	public function addMoney($player, int $money): int {
		return EconomyAPI::getInstance()->addMoney($player, $money, false, "AdvancedShop");
	}

	public function subtractMoney($player, int $money): int {
		return EconomyAPI::getInstance()->reduceMoney($player, $money, false, "AdvancedShop");
	}

	public function setMoney($player, int $money): int {
		return EconomyAPI::getInstance()->setMoney($player, $money, false, "AdvancedShop");
	}

	public function hasMoney($player, int $money): bool {
		return self::getMoney($player) >= $money;
	}

	public function getMoney($player): int {
		return EconomyAPI::getInstance()->myMoney($player);
	}

	public function exists($player): bool {
		return EconomyAPI::getInstance()->accountExists($player);
	}

	public function save() {
		if (EconomyAPI::getInstance() instanceof EconomyAPI) {
			EconomyAPI::getInstance()->saveAll();
		}
	}

	public function load(MarketAPI $plugin) {
	}

}
