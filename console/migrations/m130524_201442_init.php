<?php

use common\models\Domains;
use common\models\User;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = Yii::$app->params['tableOptions'];
        }

        $this->createTable(User::tableName(), [
            'id' => $this->primaryKey(),

            'parent_id' => $this->integer(),

            'username' => $this->string()->notNull(),
            'auth_key' => $this->string(32),
            'password' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(), //->unique()
            'email' => $this->string()->notNull(),

            'telegram_tfa' => $this->smallInteger()->defaultValue(0),
            'telegram_id' => $this->integer(),
            'telegram' => $this->string(255),
            'logo' => $this->string(255),
            'phone_number' => $this->string(255),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'ip' => $this->string(55),
            'country' => $this->string(55),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'role' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->smallInteger()->defaultValue(0),
            'deletedAt' => $this->integer(),
        ], $tableOptions);


        $this->insert(User::tableName(), [
            'username' => 'swaty007',
            'password' => 'swaty007',
            'auth_key' => 'RCRAF-NOlrYZudh9Vm31I2dh_fSDOiU9',
            'password_hash' => '$2y$13$rb2WM2vDJWkic1TZZFuXPeyvb4QG0Sm0KQqDQtxRCwpcUJ/zk21AW',
            'email' => 'swaty0007@gmail.com',
            'role' => 100,
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time()
        ]);

//        $this->createIndex('FK_user_domains', User::tableName(), 'id');
//        $this->addForeignKey(
//            'FK_user_domains', User::tableName(), 'id', Domains::tableName(), 'user_id', 'SET NULL', 'CASCADE'
//        );
    }

    public function down()
    {
        $this->dropTable(User::tableName());
    }
}
