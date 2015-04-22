<?php
/**
 * UTI, path to magic
 *
 * User: bbr
 * Date: 26/03/15
 * Time: 19:16
 */

namespace UTI\Controller;

use UTI\Core\Controller;
use UTI\Core\System;
use UTI\Lib\Form;

/**
 * Class Login
 * @package UTI\Controller
 */
class Login extends Controller
{
    public function index()
    {
        // form handling, to model login
        $loginForm = new Form('form_login');
        if ($loginForm->isSubmit()) {
            if (! $loginForm->getValue('login')) {
                $loginForm->setInvalid('login', 'Field required!');
            }
            if (! $loginForm->getValue('paswd')) {
                $loginForm->setInvalid('paswd', 'Field required');
            }
            if (! $loginForm->isInvalid()) {
                System::redirect2Url('?'.time(), $_SERVER);
            }
        }/* else {
        $loginForm->setValue('login', '');
        $loginForm->setValue('paswd', '');
    }*/

        //tpl to view
        $loginFormTpl = System::loadTpl(APP_TPL . 'form_login.tpl.php', $loginForm);
        echo $loginFormTpl;
    }
}