<?php

namespace App;
use App\Database\Database;
use App\Controller\Controller;

class App 
{

    public $title = "My Wine Cellar";
    private $db_instance;
    private static $_instance;

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load()
    {
        session_start();
        require ROOT . '/src/Autoloader.php';
        Autoloader::register();
    }

    public function getModel($name)
    {
        $class_name = '\\App\\Model\\' . ucfirst($name) . 'Model';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance('Database\config.php');
        if(is_null($this->db_instance))
        {
            $this->db_instance = new Database
            (
                $config->get('db_name'), 
                $config->get('db_user'), 
                $config->get('db_pass'), 
                $config->get('db_host')
            );
        }
        return  $this->db_instance;
    }

    public static function notFoundControl()
    {
        Controller::notFound();
    }
    
}