<?php

namespace Routes;

use \Init\Bootstrap;

class Routes extends Bootstrap {

	protected function initRoutes() {

		$routes['api/list-all-broadbands'] = array("controller" => "default",
													"model" => "broadband",
													"action" => "ListAll",
								                	"view" => "json");
		$routes['/'] = array("controller" => "default",
							"model" => "app",
							"action" => "render",
							"view" => "html");

		$this->setRoutes($routes);
	}

}