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
    protected $session;
    protected $duration;

    /**
     * @param null $savePath
     * @param int  $duration
     */
    public function __construct($savePath = null, $duration = 1800)
    {
        if (null !== $savePath) {
            session_save_path($savePath);
        }

        if ($duration) {
            //ini_set('session.gc_maxlifetime', $duration);
            $this->duration = $duration;
        }
    }

    /**
     * Start session
     *
     * @return bool
     */
    public function run()
    {
        $state = session_start();
        $this->session =& $_SESSION;    // point by reference to $_SESSION global array
        $this->correctDuration($this->duration);

        return $state;
    }

    /**
     * Get session values by key
     *
     * @param $key
     * @return mixed
     */
    public function get($key = null)
    {
        /* FUN =)
         * return null === $key
            ? ($this->session ?: null)
            : (array_key_exists($key, $this->session) ? $this->session[$key] : null);*/
        if (null === $key) {
            return $this->session ?: null;
        }

        return array_key_exists($key, $this->session) ? $this->session[$key] : null;
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
        $this->session[$key] = $value;
    }

    /**
     * Destroy session, empty $_SESSION array, unset cookies
     *
     * @return void
     */
    public function halt()
    {
        session_unset();
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

    /**
     * Custom session duration
     *
     * @param $duration
     */
    protected function correctDuration($duration)
    {
        if ($this->get('last_seen') && (time() - $this->get('last_seen') > $duration)) {
            $this->halt();
        }
        $this->set('last_seen', time());
    }
}
