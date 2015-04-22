<?php
/**
 * UTI, path to magic
 * @see https://github.com/auraphp/Aura.Router
 *
 * User: bbr
 * Date: 26/03/15
 * Time: 17:42
 */

namespace UTI\Core;

use Aura\Router\Map;
use Aura\Router\DefinitionFactory;
use Aura\Router\RouteFactory;
use UTI\Controller\Login;

/**
 * Class Route
 * @package UTI\Core
 */
class Route
{

    public static function run()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        switch ($requestUri) {


            default:
                echo $requestUri;
        }

    }
}