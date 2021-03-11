<?php

namespace common\models;


use common\models\api\SxGeo;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii2tech\ar\softdelete\SoftDeleteBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string $username
 * @property string|null $auth_key
 * @property string $password
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $telegram_tfa
 * @property int|null $telegram_id
 * @property string|null $telegram
 * @property string|null $logo
 * @property string|null $phone_number
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $ip
 * @property string|null $country
 * @property int $status
 * @property int $role
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 * @property int|null $deletedAt
 * @property string|null $verification_token
 *
 * @property Balances[] $balances
 * @property Domains[] $domains
 * @property History[] $histories
 * @property Transactions[] $transactions
 */
class User extends ActiveRecord implements IdentityInterface
{
    public const STATUS_DELETED = 0;
    public const STATUS_INACTIVE = 9;
    public const STATUS_ACTIVE = 10;

    public const ROLE_USER = 10;
    public const ROLE_MODERATOR = 50;
    public const ROLE_ADMIN = 100;

    public const SCENARIO_DEFAULT = 'default';
    public const SCENARIO_MODERATOR = 'moderator';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'softDeleteBehavior' => [
                'class' => SoftDeleteBehavior::className(),
                'softDeleteAttributeValues' => [
                    'isDeleted' => true
                ],
                'replaceRegularDelete' => true // mutate native `delete()` method
            ],
        ];
    }

    public function beforeSoftDelete()
    {
        $this->deletedAt = time(); // log the deletion date
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'telegram_tfa', 'telegram_id', 'status', 'role', 'created_at', 'updated_at', 'isDeleted', 'deletedAt'],
                'integer', 'on' => self::SCENARIO_DEFAULT],
            [['username', 'password', 'password_hash', 'password_reset_token', 'email', 'telegram', 'logo', 'phone_number', 'first_name', 'last_name', 'ip', 'country', 'verification_token'],
                'string', 'max' => 255, 'on' => self::SCENARIO_DEFAULT],
            ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_MODERATOR, self::ROLE_ADMIN], 'on' => self::SCENARIO_DEFAULT],


            [['telegram_tfa', 'telegram_id', 'status', 'created_at', 'updated_at', 'isDeleted', 'deletedAt'],
                'integer', 'on' => self::SCENARIO_MODERATOR],
            [['username', 'password', 'password_hash', 'password_reset_token', 'email', 'telegram', 'logo', 'phone_number', 'first_name', 'last_name', 'verification_token'],
                'string', 'max' => 255, 'on' => self::SCENARIO_MODERATOR],
            ['role', 'in', 'range' => [self::ROLE_USER], 'on' => self::SCENARIO_MODERATOR],


            [['username', 'password', 'email'], 'required'],
            [['auth_key'], 'string', 'max' => 32],
//            [['password_reset_token'], 'unique'],

            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],

            ['role', 'default', 'value' => self::ROLE_USER],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'parent_id' => Yii::t('backend', 'Parent ID'),
            'username' => Yii::t('backend', 'Username'),
            'auth_key' => Yii::t('backend', 'Auth Key'),
            'password' => Yii::t('backend', 'Password'),
            'password_hash' => Yii::t('backend', 'Password Hash'),
            'password_reset_token' => Yii::t('backend', 'Password Reset Token'),
            'email' => Yii::t('backend', 'Email'),
            'telegram_tfa' => Yii::t('backend', 'Telegram Tfa'),
            'telegram_id' => Yii::t('backend', 'Telegram ID'),
            'telegram' => Yii::t('backend', 'Telegram'),
            'logo' => Yii::t('backend', 'Logo'),
            'phone_number' => Yii::t('backend', 'Phone Number'),
            'first_name' => Yii::t('backend', 'First Name'),
            'last_name' => Yii::t('backend', 'Last Name'),
            'ip' => Yii::t('backend', 'Ip'),
            'country' => Yii::t('backend', 'Country'),
            'status' => Yii::t('backend', 'Status'),
            'role' => Yii::t('backend', 'Role'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'isDeleted' => Yii::t('backend', 'Is Deleted'),
            'deletedAt' => Yii::t('backend', 'Deleted At'),
            'verification_token' => Yii::t('backend', 'Verification Token'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findById($id)
    {
        if (self::canSuperAdmin()) {
            return static::findOne(['id' => $id]);
        }
        return static::findOne(['id' => $id, 'parent_id' => Yii::$app->user->identity->id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getCurrentUser()
    {
        return static::findOne(['id' => Yii::$app->user->identity->id]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token, 'status' => [self::STATUS_ACTIVE]]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $password === $this->password;
//        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setLocation()
    {
        $SxGeo = new SxGeo();
        $ip = $_SERVER['REMOTE_ADDR'];
        $country_code = $SxGeo->getCountry($ip);

        $this->ip = $ip;
        $this->country = $country_code;
        return $country_code;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function canAdmin($user_id = null)
    {
        $id = $user_id;
        if (empty($id)) {
            $id = Yii::$app->user->identity->id;
        }
        $role = static::findOne(['id' => $id])->role;
        return in_array($role, [
            self::ROLE_MODERATOR,
            self::ROLE_ADMIN,
        ]);
    }

    public static function canSuperAdmin($user_id = null)
    {
        $id = $user_id;
        if (empty($id)) {
            $id = Yii::$app->user->identity->id;
        }
        $role = static::findOne(['id' => $id])->role;
        return in_array($role, [
            self::ROLE_ADMIN,
        ]);
    }

    /**
     * Gets query for [[Balances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBalances()
    {
        return $this->hasMany(Balances::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Domains]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDomains()
    {
        return $this->hasMany(Domains::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Histories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserSettings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(UserSettings::className(), ['user_id' => 'id']);
    }

    public function takeSettingByKey($key, $user_id = null) {
        $id = $user_id;
        if (empty($id)) {
            $id = Yii::$app->user->identity->id;
        }
        $setting = UserSettings::findOne(['user_id' => $id, 'key' => $key]);
        if ($setting) {
            return $setting;
        } else {
            return Settings::findOne(['domain_id' => Domains::getCurrentDomain()->id, 'key' => $key]);
        }
    }

    /**
     * Gets query for [[Transactions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(Transactions::className(), ['user_id' => 'id']);
    }


    public function beforeSave($insert)
    {
        if (!$insert) {
//            ProductOption::deleteAll(['product_id' => $this->id]);
        }


//        if ($this->productImage) {
//            if(!empty($this->oldAttributes['image']))
//            {
//                unlink(Yii::$app->params['uploadsDir'] . $this->oldAttributes['image']);
//            }
//            $pimgName =  'prodimg' . time() . $this->id . '.' . $this->productImage->extension;
//            $this->productImage->saveAs(Yii::$app->params['uploadsDir'] . $pimgName);
//            $this->image = $pimgName;
//        } else {
//            $this->image = $this->oldAttributes['image'];
//        }
//        die();

        if (empty($this->password_reset_token)) {
//            $this->generatePasswordResetToken();
        }

        $user_id = $this->id;
        if (empty($user_id)) {
            $user_id = $this->find()->orderBy('id DESC')->one()->id;
        }

        if ((empty($this->password_hash) || $this->password !== $this->oldAttributes['password']) && !self::canSuperAdmin($user_id)) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        }

        $hasWallets = [];
        foreach ($this->balances as $balance) {
            $hasWallets[] = $balance->currency_id;
        }
        foreach (Currencies::find()->all() as $currency) {
            if (!in_array($currency->id, $hasWallets)) {
                $data = Currencies::generateWallet($currency->key, $user_id);
                if (!empty($data)) {
                    $balance = new Balances();
                    $balance->user_id = $user_id;
                    $balance->address = $data['address'];
                    $balance->currency_id = Currencies::findOne(['key' => $currency->key])->id;
                    $balance->private_hex = $data['privateKeyHex'];
                    $balance->private_wif = $data['privateKeyWif'];
                    $balance->private_dec = $data['privateKeyDec'];
//                    $data['publicKey'];
                    $balance->save();
                }
            }
        }


        return parent::beforeSave($insert);
    }
}
