<?php
/**
 *
 *
 * User: bbr
 * Date: 25/03/15
 * Time: 00:59
 */

namespace UTI\Lib;

/**
 * Class Form
 * @package UTI\Lib
 */
//http://amdy.su/work-with-forms/
//http://amdy.su/flash-message/
//http://amdy.su/flash-message-2/
//http://amdy.su/template-what-is/
class Form
{
    protected $name;
    protected $validate = [];

    public function __construct($value = 'form')
    {
        $this->name = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue($field, $default = '')
    {
        return array_key_exists($this->getName(),$_POST)
            ? htmlspecialchars($_POST[$this->getName()][$field], ENT_QUOTES, 'utf-8')
            : $default;
    }

    public function setValue($field, $value)
    {
        $_POST[$this->getName()][$field] = $value;
    }

    public function isInvalid($filed = null)
    {
        if ($filed) {
            return array_key_exists($filed, $this->validate)
                ? ' <span style="color: red;">' . $this->validate[$filed] . '</span>'
                : false;
        } else {
            return ! empty($this->validate);
        }
    }

    public function setInvalid($field, $text = '')
    {
        $this->validate[$field] = $text;
    }

    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function isSubmit()
    {
        return array_key_exists($this->getName(), $_POST);
    }
}