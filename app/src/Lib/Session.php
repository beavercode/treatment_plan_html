<?php
namespace UTI\Lib;

/**
 * http://amdy.su/work-with-session/
 * http://phpfaq.ru/sessions
 * http://phpclub.ru/detail/article/sessions
 * http://php.net/manual/en/session.configuration.php
 * http://www.softtime.ru/bookphp/gl8_1.php
 *
 * Class Session
 * @package UTI\Lib
 */
class Session
{
    public function __construct($savePath = null, $duration = null)
    {
        if (null !== $savePath) {
            session_save_path($savePath);
        }

        if (null !== $duration) {
            ini_set('session.gc_maxlifetime', $duration);
        }
    }

    /**
     * Start session
     *
     * @return bool
     */
    public function run()
    {
        return session_start();
    }

    /**
     * Get session values by key
     *
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * Set key value in $_SESSION
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Destroy session, empty $_SESSION array, unset cookies
     *
     * @return void
     */
    public function halt()
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }
        session_destroy();
    }
}
