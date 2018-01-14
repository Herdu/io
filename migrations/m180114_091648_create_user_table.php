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

        $this->insert('user', [
            'email' => 'a@b.c',
            'password' => '$2y$13$5vuNo1Ccv3uHXQcV1a.fQ.z1exdlOupvys4EPnBSJo8LGkYwAdSxe',
            'is_admin' => 1,
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
