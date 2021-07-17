<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset=<?= $this->charset ?>>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->title ?></title>

    <?php (new application\assets\AdminAssets)->register() ?>
</head>
<body>
    <div class='tab_container'>

    <?= $content ?>

    </div>
</body>
</html>