<?php
// define the MODX path constants necessary for connecting to your core
//define('MODX_BASE_PATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/modx097/');
define('MODX_CORE_PATH', dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/core/');
define('MODX_BASE_PATH', dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/');
define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager/');
define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors/');
define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets/');

/* not used -- here to prevent E_NOTICE warnings */
if (!defined('MODX_BASE_URL')) {
    define('MODX_BASE_URL', 'http://localhost/addons/');
    define('MODX_MANAGER_URL', 'http://localhost/addons/manager/');
    define('MODX_ASSETS_URL', 'http://localhost/addons/assets/');
    define('MODX_CONNECTORS_URL', 'http://localhost/addons/connectors/');
}