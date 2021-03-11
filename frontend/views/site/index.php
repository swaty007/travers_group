<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Travers Group';
?>


<section class="main">
    <div class="container">
        <div class="col-lg-6">
            <h1>
                Travers Group -
                мы ахуенны!
            </h1>
            <div class="main__block">
                <div>
                    11 февраля 2021
                    ДТ
                </div>
                <div>
                    21,85 грн/л
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <?= Html::img('@web/img/main_img.png', ['alt' => 'Main Img']) ?>
        </div>
    </div>
</section>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>
                    О Компании
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?= Html::img('@web/img/main_img.png', ['alt' => 'Main Img']) ?>
            </div>
            <div class="col-lg-6">
                <h3>
                    История компании
                </h3>
                <p>
                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 order-lg-2">
                <?= Html::img('@web/img/main_img.png', ['alt' => 'Main Img']) ?>
            </div>
            <div class="col-lg-6 order-lg-1">
                <h3>
                    История компании
                </h3>
                <p>
                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet. Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="reviews">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?= Html::img('@web/img/review_img.png', ['alt' => 'Review Img']) ?>
                <p>
                    Имя Фамилия
                </p>
                <p>
                    CEO Travers Group
                </p>
            </div>
            <div class="col-lg-6">
                <h4>
                    “Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet”
                </h4>
                <button>
                    Связаться с нами
                </button>
            </div>
        </div>
    </div>
</section>

<section class="certificate">
    <div class="container">
        <h2 class="text-center">
            Diesel EN590
        </h2>
        <div class="row">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <?= Html::img('@web/img/certificate_img.png', ['alt' => 'Certificate Image']) ?>
            </div>
        </div>
    </div>
</section>

<section class="advantages">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?= Html::img('@web/img/advantages_1.svg', ['alt' => 'Advantages 1']) ?>
                <h3 class="advantages__title">
                    15 Лет
                </h3>
                <p>
                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                </p>
            </div>
            <div class="col-lg-4">
                <?= Html::img('@web/img/advantages_2.svg', ['alt' => 'Advantages 2']) ?>
                <h3 class="advantages__title">
                    Хранилище
                </h3>
                <p>
                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                </p>
            </div>
            <div class="col-lg-4">
                <?= Html::img('@web/img/advantages_3.svg', ['alt' => 'Advantages 3']) ?>
                <h3 class="advantages__title">
                    Нефтебаза
                </h3>
                <p>
                    Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="map">
    <div class="container">
        <h2>
            Активные области действия
        </h2>
    </div>
</section>

<section class="contact">
    <div class="container">
        <h2>
            Контакты
        </h2>
        <p>
            Оставьте свои данные и мы свяжемся с Вами как
            можно быстрее
        </p>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact__block">
                    <div class="row">
                        <div class="col-6">
                            <strong>
                                Адрес
                            </strong>
                        </div>
                        <div class="col-6">
                            <p>
                                ул. Пример, г. Примерский, Примерской области, 30000
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong>
                                Время работы
                            </strong>
                        </div>
                        <div class="col-6">
                            <p>
                                9:00-18:00 Пн.-Пт.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <strong>
                                Контакты
                            </strong>
                        </div>
                        <div class="col-6">
                            <a href="tel:+380443448595">+380443448595</a>
                            <a href="mailto:contact@travers.group">contact@travers.group</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <a href="">
                                        <?= Html::img('@web/img/icons/linkedin.svg', ['alt' => 'Linkedin']) ?>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="">
                                        <?= Html::img('@web/img/icons/facebook.svg', ['alt' => 'Facebook']) ?>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="">
                                        <?= Html::img('@web/img/icons/instagram.svg', ['alt' => 'Instagram']) ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
