<?php

namespace console\controllers;

use common\models\Balances;
use common\models\Currencies;
use common\models\Log;
use Yii;
use yii\console\Controller;
use yii\db\Exception;

/**
 * CrudController
 */
class CrudController extends Controller
{
    public function actionUpdateCurrencies()
    {
        //php yii crud/update-currencies
        Currencies::updateRates();
    }

    public function actionUpdateBalances()
    {
        //php yii crud/update-balances
        $balances = Balances::find()->joinWith('currency')->where(['currencies.key' => Currencies::KEY_BTC])->all();
        foreach($balances as $balance) {
            $transactions = [];
            $transactions['final_balance'];
            foreach ($transactions['txs'] as $transaction) {
                if ($transaction['time'] > $balance->updatedAt) {
                    $transaction['block_height'];
                    $transaction['inputs'];
                    $transaction['out'];
                }
                continue;
            }
        }
    }

    public function actionUpdateGeo()
    {
        //php yii crud/update-geo
        try {
            require_once Yii::getAlias('@common').'/models/api/sxgeo_update.php';
        } catch (Exception $e) {
            Log::errorLog($e->getMessage());
        }

    }
}
