<?php
use application\widgets\URLGenerator;
?>

<!-- Main -->
	<div id="main">

		<!-- Post -->
			<article class="post">
				<header>
					<div class="title">
						<h2><?= $params['article']['title'] ?></h2>
						<p><?= $params['article']['suptitle'] ?></p>
					</div>
					<div class="meta">
						<time class="published"> <?= DateTime::createFromFormat('Y-m-d', $params['article']['date'])->format('F, j Y') ?></time>
						<span class="name"><?= $params['article']['author'] ?></span>
					</div>
				</header>

				<p><?= $params['article']['content'] ?></p>
				<footer>
					<ul class="stats">
						<li><a href=""><?= $params['article']['category'] ?></a></li>
					</ul>
				</footer>
			</article>

	</div>
