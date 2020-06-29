<?php

namespace App;
use App\Controller\Controller;

/**
 * Class Autoloader
 */
class Autoloader
{

    /**
     * Enregistre notre autoloader
     */ 
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));  
    }


    /**
     * Inclu le fichier correspondant à notre classe
     * @param $class string le nom de la classe à charger
     */
    static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0)
        {
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            $class = __DIR__ . '/'. $class .'.php';
            if (file_exists($class)) 
            {
                require $class;
                return true;             
            }
            Controller::notFound();
            return false;
        }        
    }
    
}