<?php
namespace app\controllers;

class Publication extends \app\core\Controller{
    public function create(){
        $this->view('Publication/create');
    }
    public function edit(){
        $this->view('Publication/edit');
    }
}