<?php

/**
 * UTI, path to magic
 *
 * User: bbr
 * Date: 25/03/15
 * Time: 00:35
 */

namespace UTI;

require 'vendor/autoload.php';

use UTI\Core\Route;
use UTI\Lib\AppException;
use UTI\Core\System;

ini_set('display_errors', 1);
ini_set('short_open_tag', 1);

try {
    define('APP_DIR', __DIR__ . '/src/');
    System::loadData(APP_DIR . 'config.ini.php');
    define('URI_BASE', System::$conf['app']['uri_base']);
    define('APP_TPL', APP_DIR . System::$conf['app']['tpl']);
    define('APP_LOG', APP_DIR . System::$conf['app']['log']);
    define('APP_SES', APP_DIR . System::$conf['app']['session']);
    define('APP_PDF_IN', APP_DIR . System::$conf['app']['pdf_in']);
    define('APP_PDF_OUT', APP_DIR . System::$conf['app']['pdf_out']);
    define('APP_DOCX', APP_DIR . System::$conf['app']['docx']);

    Route::run();
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
    System::log(APP_LOG . 'exceptions.log', $e->getError());
} catch (\Exception $e) {
    die('Exception fired, really?!');
}
