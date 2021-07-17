<?php

use application\widgets\URLGenerator;

?>
<section>
    <form action='/admin/formHandler' method='POST' id='create_form'>
        <input type="text" autocomplete="off" name='title' required placeholder="Title..."><br>
        <input type="text" autocomplete="off" name='suptitle' required placeholder="Suptitle..."><br>
        <textarea name='content' required placeholder="Content..."></textarea><br>
        <input type="text" autocomplete="off" name='supcontent' required placeholder="Supcontent..."><br>
        <input type="text" autocomplete="off" name='author' required placeholder="Author..."><br>
        <input type="text" autocomplete="off" name='category' required placeholder="Category..."><br>
        <input type="date" autocomplete="off" name='date' required><br>
        <button type="submit" class="form_btn">Создать</button>
    </form>
</section>


<section>
    <div id="view">

    <?php foreach ($params['articles'] as $id => $article): ?>
        <div class="article">

            <a class="fields" href=<?= URLGenerator::article($article['id']) ?>><?= $article['id'] ?></a>
            <a class="fields" id="title" href=<?= URLGenerator::article($article['id']) ?>><?= $article['suptitle'] ?></a></span>
            <a href="/admin/deletePost/<?= $article['id'] ?>" id="delete">Удалить</a>
            
        </div>
        <?php endforeach ?>
    </div>
</section>