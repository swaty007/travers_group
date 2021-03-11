<?php

/* @var $this \yii\web\View */

/* @var $content string */


use common\models\Balances;
use common\models\Currencies;
use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<nav id="dashboard__nav" class="dashboard__nav mt-4">
    <div class="container d-lg-flex justify-content-lg-between position-relative">
        <a class="navbar-brand pl-5 ml-5 ml-lg-0 pl-lg-0" href="<?= Yii::$app->homeUrl ?>"><?= $_SERVER['SERVER_NAME']; ?></a>
        <button id="navbar__burger" class="navbar__burger collapsed d-lg-none">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div id="dashboard__items" class="dashboard__items d-lg-flex pt-5 pt-lg-0">

        </div>
    </div>
</nav>

<main>
    <?= $content ?>
</main>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
