<?php

namespace App\Controller;

class Controller{

    protected $viewPath;
    protected  $layout = 'layout';
    
    /**
     * Initiate root for view's files
     *
     * @return void
     */
    public function __construct()
    {
        $this->viewPath = ROOT . '/src/Views/';
    }
    
    /**
     * load Model
     *
     * @param  mixed $model_name
     * @return void
     */
    protected function loadModel($model_name)
    {
        $app = \App\App::getInstance();
        $this->$model_name = $app->getModel($model_name);
    }
        
    /**
     * render
     *
     * @param  mixed $view
     * @param  mixed $variables
     * @return void
     */
    protected function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $title = 'My Wine Cellar';
        $content = ob_get_clean();
        require($this->viewPath . 'Layout/' . $this->layout . '.php');
    }
    
    /**
     * forbidden
     *
     * @return void
     */
    protected function forbidden()
    {
        ob_start();
        require(ROOT . '/src/Views/forbidden.php');
        $title = 'Forbidden';
        $content = ob_get_clean();
        require(ROOT . '/src/Views/Layout/Layout.php');
        exit;
    }
    
    /**
     * notFound
     *
     * @return void
     */
    public static function notFound()
    {
        ob_start();
        require(ROOT . '/src/Views/404.php');
        $title = 'Error 404';
        $content = ob_get_clean();
        require(ROOT . '/src/Views/Layout/Layout.php');
        exit;
    }
    
}