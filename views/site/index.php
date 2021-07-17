<?php 
if (!isset($_GET['page'])) {
	$_GET['page'] = 1;
}

use application\widgets\URLGenerator;

$paginationSettings = application\widgets\Pagination::init(array_reverse($params['articles']), $_GET['page']);

?>
<!-- Main -->
	<div id="main">

	<?php 
		if ($params['articles']):
		foreach ($paginationSettings['articles'] as $article):
	?>

		<!-- Post -->
			<article class="post">
				<header>
					<div class="title">
						<h2><a href=<?php URLGenerator::article($article['id']) ?>><?= $article['title'] ?></a></h2>
						<p><?= $article['suptitle'] ?></p>
					</div>
					<div class="meta">
						<time class="published"><?= DateTime::createFromFormat('Y-m-d', $article['date'])->format('F, j Y') ?></time>
						<span class="name"><?= $article['author'] ?>
					</div>
				</header>

				<p><?= $article['supcontent'] ?></p>
				<footer>
					<ul class="actions">
						<li><a href=<?php URLGenerator::article($article['id']) ?> class="button big">Continue Reading</a></li>
					</ul>
					<ul class="stats">
						<li><a href=""><?= $article['category'] ?></a></li>
					</ul>
				</footer>
			</article>

		<?php
			endforeach; 
			else: echo '<b>Статей нет</b>';
			endif;
		?>
	
		<!-- Pagination -->
			<ul class="actions pagination">
				<li><a href=<?php URLGenerator::page($_GET['page']-1) ?> class="<?php if ($_GET['page'] <= 1) echo 'disabled' ?> button big">Previous Page</a></li>
				<li><a href=<?php URLGenerator::page($_GET['page']+1) ?> class="<?php if ($_GET['page'] == $paginationSettings['pages']) echo 'disabled' ?> button big">Next Page</a></li>
			</ul>

	</div>

<!-- Sidebar -->
	<section id="sidebar">

		<!-- Intro -->
			<section id="intro">
				<header>
					<h2>Future Imperfect</h2>
				</header>
			</section>

		<!-- Mini Posts -->
			<section>
				<div class="mini-posts">

				<?php 
					if ($params['articles']):
					foreach (array_rand($params['articles'], 3) as $key):
				?>
					<!-- Mini Post -->
						<article class="mini-post">
							<header>
								<h3><a href=<?php URLGenerator::article($params['articles'][$key]['id']) ?>><?= $params['articles'][$key]['title'] ?></a></h3>
								<time class="published"><?= DateTime::createFromFormat('Y-m-d', $params['articles'][$key]['date'])->format('F, j Y') ?></time>
							</header>
						</article>

				<?php
					endforeach; 
					endif;
				?>
				</div>
			</section>

		<!-- About -->
			<section class="blurb">
				<h2>About</h2>
				<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
			</section>
