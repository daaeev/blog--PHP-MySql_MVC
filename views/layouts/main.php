<?php 

$assets = (new application\lib\AssetManager);

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title><?= $this->title ?></title>
		<meta charset=<?= $this->charset ?> />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<?php (new application\assets\MainAssets)->register() ?>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="/">Future Imperfect</a></h1>
					</header>

						<?= $content ?>

			</div>

	</body>
</html>