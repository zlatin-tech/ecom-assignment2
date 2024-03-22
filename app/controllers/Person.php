<?php
namespace app\controllers;

use stdClass;

class Person extends \app\core\Controller{
    public function main(){
        $controller = new \app\controllers\Publication();
        $this->view('Main/index', $controller->getAllPublications());
    }
}