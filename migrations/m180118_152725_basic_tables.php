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

        $this->createTable('furniture_type',[
                'id' => $this->primaryKey(11),
                'name' => $this->string(128)->notNull(),
            ]
        );

        $this->createTable('furniture', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(128)->notNull(),
            'price' => $this->float(2)->notNull(),
            'image_url' => $this->string(128),
            'description' => $this->string(1024)->notNull(),
            'is_renovated' => 'tinyInt(1) NOT NULL',
            'furniture_type_id' => $this->integer(11)->notNull(),
            'furniture_stype_id' => $this->integer(11)->notNull(),
        ]);

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
            'email' => $this->string(128),
            'message_title_id' => $this->integer(11),
            'message_title' => $this->string('128'),
            'furniture_id' => $this->integer(11),
        ]);

        $this->createTable('gallery_type', [
            'id' => $this->primaryKey(11),
            'name' => $this->string(128)->notNull(),
        ]);

        $this->createTable('picture',[
            'id' => $this->primaryKey(11),
            'image_url' => $this->string(128)->notNull(),
            'title' => $this->string(128)->notNull(),
            'gallery_type_id' => $this->integer(11)->notNull(),
        ]);

        //todo ADD FOREIGN KEYS AND SAFEDOWN

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {

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
