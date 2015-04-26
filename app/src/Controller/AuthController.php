<?php
namespace UTI\Controller;

use UTI\Core\Controller;
use UTI\Core\View;
use UTI\Model\AuthModel;

/**
 * Class LoginController
 * @package UTI\Controller
 */
class AuthController extends Controller
{
    public function __construct($router)
    {
        parent::__construct($router);

        $this->model = new AuthModel();
        $this->view = new View();
    }

    public function index($params)
    {
        // if logged in then go to uri '/plan' else $this->login action
        $data = $this->model->isLogged();
        //$data = $this->model->getData();
        $this->view->render('form_login_block.php', 'login_template.php', $data);
    }

    public function login($params)
    {
        echo __METHOD__;
    }

    public function logout($params)
    {
        echo __METHOD__;
    }
}
