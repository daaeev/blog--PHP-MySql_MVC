<?php

namespace application\lib;

use application\lib\View;

// Class for connecting css, js files
class AssetManager
{
    public $defaultPath = 'assets';
    public $cssOptions;
    public $linkOptions;
    public $css;
    public $js;
    public $link;
    public $depends;

    public function register() 
    {
        // Register depends
        if (!empty($this->depends)) {
            foreach ($this->depends as $path) {
                if (!class_exists($path)) {
                    View::errorPage('Undefined asset-class');
                }
                (new $path)->register();
            }
        }

        // Register css-link tags
        if (!empty($this->css)) {
            $optionsString = '';
            if (!empty($this->cssOptions)) {
                foreach ($this->cssOptions as $option => $val) {
                    $optionsString .= " $option=$val";
                }
            }
            foreach ($this->css as $src) {
                $src = '/' . $this->defaultPath . '/css/' . $src;
                echo "<link$optionsString href=$src>";
            }
        }

        // Register js-src tags
        if (!empty($this->js)) {
            
            foreach ($this->js as $src) {
                $src = '/' . $this->defaultPath . '/js/' . $src;
                echo "<script src=$src></script>";
            }
        }

        // Register link tags
        if (!empty($this->link)) {
            $optionsString = '';
            if(!empty($this->linkOptions)) {
                foreach ($this->linkOptions as $option => $val) {
                    $optionsString .=  " $option=$val";
                }
            }
            foreach ($this->link as $src) {
                echo "<link href=$src$optionsString>";
            }
        }
    }

    public function image($name)
    {
        echo '/' . $this->defaultPath . '/img/' . $name;
    }
}
