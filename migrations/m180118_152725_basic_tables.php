<?php

use yii\db\Migration;

/**
 * Class m180118_152725_basic_tables
 */
class m180118_152725_basic_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('furniture_type',[
                'id' => $this->primaryKey(11),
                'name' => $this->string(128)->notNull(),
            ]
        );

        $this->createTable('furniture_style',[
            'id' => $this->primaryKey(11),
            'name' => $this->string(128)->notNull(),
        ]);

        $this->createTable('furniture', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(128)->notNull(),
            'price' => $this->float(2)->notNull(),
            'image_url' => $this->string(128),
            'description' => $this->string(1024)->notNull(),
            'is_renovated' => 'tinyInt(1) NOT NULL',
            'furniture_type_id' => $this->integer(11)->notNull(),
            'furniture_style_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey('fk_furniture_furniture_type', 'furniture', 'furniture_type_id', 'furniture_type', 'id');
        $this->addForeignKey('fk_furniture_furniture_style', 'furniture', 'furniture_style_id', 'furniture_style', 'id');


        $this->createTable('content', [
            'id' => $this->primaryKey(),
            'image_url' => $this->string(128),
            'title' => $this->string(128)->notNull(),
            'description' => $this->string(1024)->notNull(),
        ]);

        $this->createTable('message_title',[
            'id' => $this->primaryKey(11),
            'name' => $this->string(128)->notNull(),
        ]);

        $this->createTable('message', [
            'id' => $this->primaryKey(11),
            'email' => $this->string(128)->notNull(),
            'message_title_id' => $this->integer(11),
            'message_title' => $this->string('128'),
            'furniture_id' => $this->integer(11),
        ]);

        $this->addForeignKey('fk_message_message_title', 'message', 'message_title_id', 'message_title', 'id');
        $this->addForeignKey('fk_message_furniture', 'message', 'furniture_id', 'furniture', 'id');


        $this->createTable('picture',[
            'id' => $this->primaryKey(11),
            'image_url' => $this->string(128)->notNull(),
            'title' => $this->string(128)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_message_furniture', 'message');
        $this->dropForeignKey('fk_message_message_title', 'message');
        $this->dropForeignKey('fk_furniture_furniture_type', 'furniture');
        $this->dropForeignKey('fk_furniture_furniture_style', 'furniture');

        $this->dropTable('picture');
        $this->dropTable('message');
        $this->dropTable('message_title');
        $this->dropTable('content');
        $this->dropTable('furniture');
        $this->dropTable('furniture_style');
        $this->dropTable('furniture_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180118_152725_basic_tables cannot be reverted.\n";

        return false;
    }
    */
}
