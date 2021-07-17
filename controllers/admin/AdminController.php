<?php 

namespace controllers\admin;

use application\lib\Controller;

class AdminController extends Controller
{

    public function actionMain() 
    {
        $this->view->layout = 'admin';
        $this->view->title = 'Admin Page';

        $articles = $this->model->getAll('Articles');
        $this->view->render('admin', compact('articles'));
    }

    public function actionFormHandler() 
    {
        $title = $_POST['title'];
        $suptitle = $_POST['suptitle'];
        $content = $_POST['content'];
        $supcontent = $_POST['supcontent'];
        $date = $_POST['date'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $this->model->createObject('articles', compact('title', 'suptitle', 'content', 'supcontent', 'date', 'category', 'author'));

        $this->view->redirect($_SERVER['HTTP_REFERER']);
    }

    public function actionDeletePost()
    {
        $id = (explode('/', substr($_SERVER['REQUEST_URI'], 1)))[2];
        $this->model->deleteObject($id);

        $this->view->redirect($_SERVER['HTTP_REFERER']);
    }
       
}
