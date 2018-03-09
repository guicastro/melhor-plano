<?php

namespace Api;

use \Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['api/list-all-broadbands'] = array("controller" => "broadband",
													"action" => "ListAll",
								                	"view" => "json");

		$this->setRoutes($routes);
	}

}