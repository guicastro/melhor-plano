<?php

namespace Routes;

use Init;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['public'] = array("route" => "/",
								"controller" => "indexController",
								"action" => "index");

		$routes['contact'] = array("route" => "/contact",
									"controller" => "indexController",
									"action" => "contact");

		$this->setRoutes($routes);
	}

}