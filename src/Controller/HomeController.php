<?php

namespace App\Controller;

class HomeController extends Controller{
    
    public function __construct(){
        parent::__construct();
        $this->render('home');
    }
}