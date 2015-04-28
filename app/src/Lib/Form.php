<?php
namespace UTI\Lib;

/**
 * Form handling
 *
 * http://amdy.su/work-with-forms/
 * http://amdy.su/flash-message/
 * http://amdy.su/flash-message-2/
 * http://amdy.su/template-what-is/
 *
 * @package UTI\Lib
 */
class Form
{
    protected $name;
    protected $validate = [];

    public function __construct($value = 'form')
    {
        $this->name = $value;
    }

    /**
     * Get form name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get field value of the form.
     * Escaping characters to prevent XSS
     *
     * @param        $field
     * @param string $default
     * @return string
     */
    public function getValue($field, $default = '')
    {
        return array_key_exists($field, $_POST[$this->getName()])
            ? htmlspecialchars($_POST[$this->getName()][$field], ENT_QUOTES, 'utf-8')
            : $default;
    }

    /**
     * Set field value of the form
     *
     * @param $field
     * @param $value
     */
    public function setValue($field, $value)
    {
        $_POST[$this->getName()][$field] = $value;
    }

    /**
     * Set form field as invalid
     *
     * @param        $field
     * @param string $text
     */
    public function setInvalid($field, $text = '')
    {
        $this->validate[$field] = $text;
    }

    /**
     * Check if field is invalid or if there exists a fields that need validation
     *
     * @param null $filed
     * @return bool|string
     */
    public function isInvalid($filed = null)
    {
        if ($filed) {
            return array_key_exists($filed, $this->validate)
                //todo rid of html in logic
                ? ' <span style="color:red">' . $this->validate[$filed] . '</span>'
                : false;
        } else {
            return (bool)$this->validate;
        }
    }

    /**
     * Is post a request method
     *
     * @return bool
     */
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Is form submitted using post method
     *
     * @return bool
     */
    public function isSubmit()
    {
        return array_key_exists($this->getName(), $_POST);
    }
}
