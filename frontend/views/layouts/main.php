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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<?php $this->beginBody() ?>


<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
            <?= Html::img('@web/img/logo.svg', ['alt' => 'Logo']) ?>
        </a>
        <button class="navbar-toggler navbar__burger collapsed" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        <?= Yii::t('frontend', 'О компании'); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#certificate">
                        <?= Yii::t('frontend', 'Клиентам'); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        <?= Yii::t('frontend', 'Контакты'); ?>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="tel:+380443448595">+380443448595</a>
                </li>
                <li class="nav-item">
                    <a class="main-btn" href="#contact">
                        <?= Yii::t('frontend', 'Связаться с нами'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <?= $content ?>
</main>

<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <a href="<?= Yii::$app->homeUrl ?>">
                    <?= Html::img('@web/img/logo.svg', ['alt' => 'Logo']) ?>
                </a>
            </div>
            <div class="col-md-8">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a href="#about" class="nav-link">
                            <?= Yii::t('frontend', 'О компании'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#certificate" class="nav-link">
                            <?= Yii::t('frontend', 'Клиентам'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">
                            <?= Yii::t('frontend', 'Контакты'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>


<?php $this->endBody() ?>


<script type="text/javascript">
    (function(d, w, s) {
        var widgetHash = 'c1ahuqyd3spons2pu0wn', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
        gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
        var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
    })(document, window, 'script');
</script>

</body>
</html>
<?php $this->endPage() ?>
