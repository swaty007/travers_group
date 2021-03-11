<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-3">
            <h4>Search</h4>
            <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <div class="col-xs-12 col-sm-9">
            <h4>List</h4>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'username',
            'auth_key',
            'password',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            //'telegram_tfa',
            //'telegram_id',
            //'telegram',
            //'logo',
            //'phone_number',
            //'first_name',
            //'last_name',
            //'ip',
            //'country',
            //'status',
            //'role',
//            'role' => [
//                'label' => 'Role',
//                'format' => 'raw',
//                'value' => function($data) {
//                    if (
//                        $data['role'] == \common\models\User::USER_ROLE_SUPPLIER &&
//                        (\common\models\Supplier::findOne(['supplier_id' => $data['id']]))
//                    ) {
//                        $data = Html::a(
//                            \common\models\User::getRoleNameFromValue($data['role']),
//                            \yii\helpers\Url::toRoute('/supplier/index?SearchSupplier%5Bsupplier_id%5D=' . $data['id']));
//                    } else {
//                        $data = \common\models\User::getRoleNameFromValue($data['role']);
//                    }
//                    return $data;
//                }
//            ],
//            'status' => [
//                'label' => 'Status',
//                'value' => function ($data) {
//                    switch ($data['status']) {
//                        case 0:
//                            return 'Deactivated';
//                            break;
//                        case 10:
//                            return 'Active';
//                            break;
//                    }
//                }
//            ],
            'created_at:datetime',
            //'updated_at:datetime',
            //'isDeleted',
            //'deletedAt',
            //'verification_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        </div>
    </div>
    <?php Pjax::end(); ?>

</div>
