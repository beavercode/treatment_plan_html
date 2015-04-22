<?php
/**
 * UTI, path to magic
 *
 * User: bbr
 * Date: 26/03/15
 * Time: 17:40
 */

namespace UTI\Core;

class Controller
{
    protected $session;

    public function __construct($session = null)
    {
        if (null !== $session && is_object($session)) {
            $this->session = new $session;
        }
    }
}