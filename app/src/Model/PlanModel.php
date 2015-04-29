<?php
namespace UTI\Model;

use UTI\Core\Model;

class PlanModel extends Model
{

    public function processForm()
    {
        echo date('H:i:s', $this->session->get('last_seen'));
        //todo add plan form
    }
}
