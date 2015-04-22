<?php
/**
 * UTI, path to magic
 *
 * User: bbr
 * Date: 25/03/15
 * Time: 00:42
 */

namespace UTI\Core;
use UTI\Lib\File;

/**
 * System wide functions
 *
 * Class System
 * @package UTI\Lib
 */
class System
{
    public static $conf;

    /**
     * Write data to log file
     *
     * @param        $fileName
     * @param        $data
     * @return false|int
     * @internal param string $time_sep
     * @internal param string $nl New line separator, unix style be default
     */
    public static function log($fileName, $data)
    {
        $timeSeparator = ' | ';
        $lineSeparator = "\n";
        $data = date('Y-m-d H:i:s O') . " {$timeSeparator} " . $data;

        return File::write($fileName, $data . $lineSeparator);
    }

    /**
     * Load file data
     *
     * @param $fileName
     * @return mixed
     * @throws AppException
     */
    public static function loadData($fileName)
    {
        if (! $data = include "$fileName") {
            throw new AppException('can\'t include file.');
        }

        self::$conf = $data;
    }

    /**
     * Include template file
     *
     * @param $fileName
     * @return string
     */
    public static function loadTpl($fileName)
    {
        ob_start();
        if (! include "$fileName") {
            throw new AppException('Can\'t load template "' . $fileName .'"');
        }

        return ob_get_clean();
    }

    /**
     * Redirect to url
     *
     * @param        $uri
     * @param        $server
     * @param string $schema
     */
    public static function redirect2Url($uri, $server, $schema = 'http://')
    {
        header('Location: ' . $schema . $server['HTTP_HOST'] . '' . $server['PHP_SELF'] . $uri);
    }

    /**
     * Rid of base path in URI string, e.g.:
     * example.com/base/path/controller/action/id   =>  example.com/controller/action/id
     *
     * @param  string $uri          where to find
     * @param  string $basePath     what to find
     * @param  string $baseReplace  replacement string, default ''
     * @return string
     */
    public static function getRealUri($uri, $basePath, $baseReplace = '')
    {
        if ($basePath === '' || $basePath === '/' || $basePath === 'index.php') {
            return '/';
        }
        $uri = self::removeSlashes($uri);
        $realUri = substr_replace($uri, $baseReplace, strpos($uri, $basePath), strlen($basePath));
        $realUri = '/' . $realUri . '/';

        return self::removeSlashes($realUri);
    }

    /**
     * Remove slashes duplicates
     *
     * @param $str
     * @return mixed
     */
    public static function removeSlashes($str)
    {
        return preg_replace('~/+~', '/', $str);
    }
}
