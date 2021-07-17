<?php

namespace application\assets;

use application\lib\AssetManager;

class FontAssets extends AssetManager
{
    public $link = [
        'https://fonts.googleapis.com',
        'https://fonts.gstatic.com',
        'https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap'
    ];
    public $linkOptions = ['rel' => 'preconnect'];
    public $depends = [];
}