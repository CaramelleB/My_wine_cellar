<?php

namespace App\Controller;

use \App\Model\LoginModel;
use \App\App;

class SliderController extends Controller{


    public function __construct(){
        parent::__construct();
        $user = new LoginModel(App::getInstance()->getDb());
        if(!$user->logged()){
            $this->forbidden();
        }
        $this->loadModel('Wine');
    }
    
    public function slide(){
        $wineSlide = $this->Wine->slider();
        $wines = $wineSlide['wine'];
        $buttons = $wineSlide['buttons'];
        $this->render('slider', compact('wines', 'buttons'));
    }
}