<?php

use yii\db\Migration;

/**
 * Class m180218_151120_alter_furniture_add_dimensions_and_period
 */
class m180218_151120_alter_furniture_add_dimensions_and_period extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('furniture', 'width', $this->integer(11)->notNull());
        $this->addColumn('furniture', 'height', $this->integer(11)->notNull());
        $this->addColumn('furniture', 'depth', $this->integer(11)->notNull());
        $this->addColumn('furniture', 'period', $this->string(64)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('furniture', 'width');
        $this->dropColumn('furniture', 'height');
        $this->dropColumn('furniture', 'depth');
        $this->dropColumn('furniture', 'period');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180218_151120_alter_furniture_add_dimensions_and_period cannot be reverted.\n";

        return false;
    }
    */
}
