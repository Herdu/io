<?php

use yii\db\Migration;

/**
 * Class m180218_175409_insert_into_message_titles
 */
class m180218_175409_insert_into_message_titles extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insert('message_title', ['name' => 'Zapytanie dot. mebli']);
        $this->insert('message_title', ['name' => 'Zapytanie dot. usług']);
        $this->insert('message_title', ['name' => 'Inne']);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180218_175409_insert_into_message_titles cannot be reverted.\n";

        return false;
    }
    */
}
