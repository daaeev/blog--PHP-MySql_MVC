<?php

namespace application\widgets;

// Class for creating href links
class URLGenerator
{
    public static function article($id)
    {
        echo "/site/post/$id";
    } 
    
    public static function page($page)
    {
        echo "/?page=$page";
    }
}