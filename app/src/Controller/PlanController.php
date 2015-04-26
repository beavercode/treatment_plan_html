<?php
namespace UTI\Controller;

use \UTI\Core\Controller;
use UTI\Core\View;
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
        $this->view = new View();
    }

    public function index($params)
    {
        $data = $this->model->getData();
        $this->view->render('form_login.tpl.php', 'main.tpl.php', $data);
    }

    public function add($params)
    {
        echo __METHOD__;
    }

    public function show($params)
    {
        //  /plan/show
        $path = $this->router->generate('plan.show.name');
        $href = htmlspecialchars($path, ENT_QUOTES, 'UTF-8');
        $arr = $this->getShowData();
        foreach ($arr as $key => $val) {
            echo '<pre>#' . $key . ' - ' . $val . '</pre>(' . $href . ')';
        }
    }

    public function showByName($params)
    {
        echo __METHOD__;
        var_dump($params);
    }

    //data stub
    private function getShowData()
    {
        return array(
            'plan1' => 'Treatment plan number1',
            'plan2' => 'Treatment plan number2',
            'plan3' => 'Treatment plan number3',
            'plan4' => 'Treatment plan number4'
        );
    }
}
