<?php

namespace application\lib;

// Main мшуц class
class View
{
    public $defaultViewsPath;
    public $defaultTemplatePath;
    public $layout = 'main';
    public $title = 'Template';
    public $charset = 'utf-8';


    public function __construct(
        protected $params
    ) {
        $this->defaultViewsPath = APP_PATH . '/views/' . $this->params['controller'];
    }

    // Render pages
    public function render($viewName, $params = [])
    {
        $view = $this->defaultViewsPath . '/' . $viewName . '.php';
        if (empty($this->defaultTemplatePath)) {
            $this->defaultTemplatePath = APP_PATH . '/views/layouts/' . $this->layout . '.php';
        }

        ob_start();
        if (!file_exists($view)) {
            View::errorPage('Undefined view');
        }
        require $view;
        $content = ob_get_clean();
        if (!file_exists($this->defaultTemplatePath)) {
            View::errorPage('Undefined template');
        }
        require $this->defaultTemplatePath;
    }

    // Redirect function
    public function redirect($url)
    {
        header('location:' . $url);
    }

    // Render error page
    public static function errorPage($msg)
    {
        echo 'ERROR:' . $msg;
        exit;
    }
}
