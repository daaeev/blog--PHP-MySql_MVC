<?php 

namespace controllers\site;

use application\lib\Controller;

class SiteController extends Controller
{

    public function actionMain() 
    {
        $articles = $this->model->getAll('Articles');
        $this->view->render('index', compact('articles'));
    }
    
    public function actionPost() 
    {
        $route = substr($_SERVER['REQUEST_URI'], 1);
        $route = explode('/', $route);
        $id = $route['2'];
        $article = $this->model->getObjectById('Articles', $id);
        $this->view->render('single', compact('article'));
    }    
    
}
