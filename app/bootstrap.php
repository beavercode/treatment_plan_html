<?php

namespace UTI;

use UTI\Core\Router;
use UTI\Core\AppException;
use UTI\Core\System;

require 'vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('short_open_tag', 1);

try {
    define('APP_DIR', __DIR__ . '/src/');
    System::loadConf(APP_DIR . 'config.php');
    define('URI_BASE', System::getConfig('app.uri_base'));
    define('APP_TPL', APP_DIR . System::getConfig('app.tpl'));
    define('APP_SES', APP_DIR . System::getConfig('app.session'));
    define('APP_LOG', APP_DIR . System::getConfig('app.log'));
    define('APP_PDF_IN', APP_DIR . System::getConfig('app.pdf_in'));
    define('APP_PDF_OUT', APP_DIR . System::getConfig('app.pdf_out'));
    define('APP_DOCX', APP_DIR . System::getConfig('app.docx'));

    $router = new Router($_SERVER, URI_BASE);
    $router->run();

    //https://github.com/squizlabs/PHP_CodeSniffer/wiki
    //https://www.jetbrains.com/phpstorm/help/using-php-code-sniffer-tool.html
    //http://phpmd.org/
    //https://jtreminio.com/2012/10/composer-namespaces-in-5-minutes/
    //http://harikt.com/blog/2015/01/13/experimenting-on-different-framework/

    //https://ru.wikipedia.org/wiki/Model-View-Controller
    //http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller
    //http://habrahabr.ru/post/150267/
    //http://habrahabr.ru/post/215605/

} catch (AppException $e) {
    //System::log(APP_LOG . 'exceptions.log', $e->getError());
    echo $e->getError();
} catch (\Exception $e) {
    die('Exception fired, really?!');
}
