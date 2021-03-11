<?php

namespace frontend\models;

use common\models\Transactions;
use yii\base\Model;

/**
 * Signup form
 */
class DepositForm extends Model
{
    public $value;
    public $currency;

    /**
     * @var Transactions
     */
    public $instance;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value', 'currency'], 'required'],
            [['value'], 'number'],
        ];
    }

    /**
     * @return bool|Transactions|null
     */
    public function createDeposit()
    {
        if (!$this->validate()) {
            return null;
        }

        $this->addError('address', 'address faild');
    }
}
