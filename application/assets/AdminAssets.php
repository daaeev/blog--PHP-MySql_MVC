<?php

namespace application\assets;

use application\lib\AssetManager;

class AdminAssets extends AssetManager
{
    public $css = ['admin.css'];
    public $cssOptions = ['rel' => 'stylesheet'];
    public $depends = ['application\assets\FontAssets'];
}