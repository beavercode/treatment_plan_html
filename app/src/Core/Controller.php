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

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = new View();
    }
}
