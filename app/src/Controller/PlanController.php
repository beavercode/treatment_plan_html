<?php
namespace UTI\Controller;

use UTI\Core\Controller;
use UTI\Core\System;
use UTI\Model\PlanModel;

/**
 * Class Plan
 * @package UTI\Controller
 */
class PlanController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);
        $this->model = new PlanModel();
        if (! $this->model->isLogged()) {
            System::redirect2Url($this->router->generate('auth.login'), $_SERVER);
        }
    }

    public function main($params)
    {
        //todo fill the form, show action menu
        $this->view->render('form_plan.php', 'plan_template.php');
    }

    public function add($params)
    {
        //todo generate digest pdf
        echo __METHOD__;
    }

    // -------------- NEXT ACTIONS IS OPTIONAL -------------- //

    public function show($params)
    {
        //generating links based on controller and action using aura/router
        $path = $this->router->generate('plan.show.name');

        echo htmlspecialchars($path, ENT_QUOTES, 'UTF-8');
    }

    public function showByName($params)
    {
        echo __METHOD__;
        var_dump($params);
    }
}
