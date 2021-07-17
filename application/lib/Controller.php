<?php

namespace application\lib;

use application\lib\DataBaseReader;

// Main controller class
class Controller
{
    public $acs;

    public function __construct(
        protected $params,
        protected $view
    ) {
        $this->loadModel();
        
        if (!$this->confirmAcs()) {
            $this->view::errorPage('Access is not confirmed');
        }
    }

    public function loadModel($name = null)
    {
        $this->model = new DataBaseReader;
        /* $path = 'models\\' . ucfirst($name);
        if (class_exists($path)) {
            $this->model = new $path;
        } else {
            $this->view::errorPage('Undefined model');
        } */
    } 


    // --- Confirm access methods
    public function confirmAcs()
    {
        $acs = require APP_PATH . '/application/config/access.php';
        $this->acs = $acs[$this->params['controller']];
        if ($this->isConfirm('all')) {
            return true;
        } elseif ($this->isConfirm('admin')) {
            return true;
        }
    }


    public function isConfirm($acs)
    {
        return in_array($this->params['action'], $this->acs[$acs]);
    }
    // ---
}
