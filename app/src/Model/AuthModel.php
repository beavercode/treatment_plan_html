<?php
namespace UTI\Model;

use UTI\Core\Model;
use UTI\Core\System;
use UTI\Lib\Form;

class AuthModel extends Model
{
    public function getData()
    {
        return 'data';
    }

    public function isLogged()
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
                //todo add session support
                System::redirect2Url(URI_BASE . 'plan', $_SERVER);
            }
        } else {
            $loginForm->setValue('login', '');
            $loginForm->setValue('paswd', '');
        }

        return $loginForm;
    }
}
