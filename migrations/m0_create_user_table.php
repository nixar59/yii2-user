<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m0_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'phone' => $this->string(),
            'phone_confirm_code' => $this->string(),
            'phone_confirmed' => $this->boolean(),
            'email' => $this->string(),
            'email_confirm_code' => $this->string(),
            'email_confirmed' => $this->boolean(),
            'password' => $this->string(),
            'auth_key' => $this->string(),
            'access_token' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
