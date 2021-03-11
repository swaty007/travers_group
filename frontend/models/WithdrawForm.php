<?php

namespace frontend\models;

use common\models\Transactions;
use yii\base\Model;

/**
 * Signup form
 */
class WithdrawForm extends Model
{
    public $value;
    public $currency;
    public $address;

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
            [['value', 'currency', 'address'], 'required'],
            [['address', 'value'], 'trim'],
            [['address'], 'string', 'max' => 50, 'min' => 2],
            [['value'], 'number'],
        ];
    }

    /**
     * @return bool|Transactions|null
     */
    public function createWithdraw()
    {
        if (!$this->validate()) {
            return null;
        }

        $this->addError('address', 'address faild');
    }
}
