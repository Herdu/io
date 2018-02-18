<?php

use yii\db\Migration;

/**
 * Class m180218_165453_alter_message_add_text
 */
class m180218_165453_alter_message_add_text extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('message', 'text', $this->string(1024)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('message', 'text');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180218_165453_alter_message_add_text cannot be reverted.\n";

        return false;
    }
    */
}
