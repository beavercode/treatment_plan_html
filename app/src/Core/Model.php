<?php
namespace UTI\Core;

use UTI\Lib\Session;

/**
 * Class Model
 * @package UTI\Core
 */
abstract class Model
{
    /**
     * @var \UTI\Lib\Session
     */
    protected $session;

    public function __construct()
    {
        $this->session = new Session(APP_SES, 36000); //36000 - cookie duration for sessions equals 10 hours
        $this->session->run();
    }

    /**
     * Check logged or not
     *
     * @return bool
     */
    public function isLogged()
    {
        return $this->session->get('auth') === 'in';
    }
}
