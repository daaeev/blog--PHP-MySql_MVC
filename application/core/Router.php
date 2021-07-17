<?php

namespace application\core;

use application\lib\View;

// Router class. Processes a URL and looks for a suitable controller
class Router
{
    private $routes; // Array of all routes
    private $route; // URL - route
    private $params; // Params [controller => ... | action => ...]


    // Parsing url
    public function run()
    { 
        $this->routes = require APP_PATH . '/application/config/routes.php';
        $route = substr($_SERVER['REQUEST_URI'], 1);
        $route = explode('/', $route);
        isset($route['1']) ? ($this->route = ($route['0'] . '/' . $route['1'])) : ($this->route = '');
        
        foreach ($this->routes as $key => $val) {
            if ($this->route === $key) {
                $this->params = $val;  
            }
        }
        if (!empty($this->params)) {
            $this->init();
        } else {
            View::errorPage('Undefined route');
        }
    }
    
    // Creating paths to application objects ...controller, view...
    public function init()
    {
        $controllerPath =  'controllers\\' . $this->params['controller'] . '\\' . ucfirst($this->params['controller']) . 'Controller';
        $action = 'action' . ucfirst($this->params['action']);
        $this->find($controllerPath, $action);

    }
   
    // Creation of all objects ...controller, view...
    public function find($path, $action)
    {
        if (class_exists($path)) {
            if(method_exists($path, $action)) {

                $view = new View($this->params); // Create view object
                (new $path($this->params, $view))->$action(); // Create controller object

            } else {
                View::errorPage('Undefined action');
            }
        } else {
            View::errorPage('Undefined controller');
        }
    }

}
