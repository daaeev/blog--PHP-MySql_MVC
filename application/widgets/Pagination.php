<?php

namespace application\widgets;

//Class for creating pagination data
class Pagination
{
    public static function init($articlesList, $page)
    {
        // Use THIS to change articles count on page
        $articlesOnPageCount = 3;

        $articlesCount = count($articlesList);
        $pages = ceil($articlesCount / $articlesOnPageCount);

        $maxArticleId = $page * $articlesOnPageCount;
        $minArticleId = $maxArticleId - $articlesOnPageCount;

        $articles = [];
        foreach ($articlesList as $id => $article) {
            if ($id <= ($minArticleId-1)) {
                continue;
            } elseif ($id > ($maxArticleId-1)) {
                break;
            }

            $articles[] = $article;
            
        }

        return compact('pages', 'articles');
    }
}