<?php
namespace app\controllers;

use stdClass;

class Person extends \app\core\Controller{
    public function main(){
        $this->view('Person/index');
    }
}