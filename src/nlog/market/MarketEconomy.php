<?php

namespace nlog\market;

use nlog\market\money\MarketMoney;
use onebone\economyapi\EconomyAPI;
use pocketmine\plugin\PluginBase;

class MarketEconomy extends PluginBase {

	public function onEnable(): void {
		if (
				!class_exists(MarketAPI::class)
				|| !class_exists(EconomyAPI::class)
		) {
			$this->getLogger()->alert("이 플러그인은 AdvancedMarket, EconomyAPI 플러그인이 필요합니다.");
			$this->getServer()->getPluginManager()->disablePlugin($this);
			return;
		}
		MarketMoney::setProvider(new EconomyProvider());
		$this->getLogger()->notice("AdvancedMarket 플러그인의 Money-Provider를 EconomyAPI로 변경하였습니다.");
	}

}