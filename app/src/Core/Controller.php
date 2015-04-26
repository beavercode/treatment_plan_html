<?php
namespace UTI\Core;

abstract class Controller
{
    /**
     * @var \Aura\Router\Router
     */
    protected $router;

    protected $view;
    protected $model;
    protected $session;

    public function __construct($router)
    {
        $this->router = $router;

        //todo: right session handling
        /*if (null !== $session && is_object($session)) {
            $this->session = new $session;
        }*/
        //$this->view = $view;
    }

    /**
     * Default action
     *
     * @param $params
     * @return mixed
     */
    abstract public function index($params);
}
