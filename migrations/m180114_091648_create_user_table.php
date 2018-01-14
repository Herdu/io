<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180114_091648_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(128)->notNull(),
            'password' => $this->string(256)->notNull(),
            'is_admin' => 'tinyint(1)',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
