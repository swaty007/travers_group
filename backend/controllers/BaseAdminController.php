<?php

namespace backend\controllers;


use common\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

abstract class BaseAdminController extends Controller
{
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
//            return $this->redirect(Url::to('/site/login'))->send();
        }
        if (Yii::$app->user->identity->role !== User::ROLE_ADMIN) {
//            return $this->redirect(Url::to('/'))->send();
        }

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }
}
