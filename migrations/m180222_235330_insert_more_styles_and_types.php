<?php

use yii\db\Migration;

/**
 * Class m180222_235330_insert_more_styles_and_types
 */
class m180222_235330_insert_more_styles_and_types extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->insertStyle(['Rokoko','Klasycystyczny', 'Eklektyczny', 'Art deco']);
        $this->insertTypes(['Biurko', 'Komoda', 'Szafa', ' Szafka', 'Toaletka', 'Ława']);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->delete('furniture_style');
        $this->delete('furniture_type');

    }


    private function insertStyle($names) {
        foreach($names as $name){
            $this->insert('furniture_style', [
                'name' => $name
            ]);
        }
    }

    private function insertTypes($names) {
        foreach($names as $name){
            $this->insert('furniture_type', [
                'name' => $name
            ]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180222_235330_insert_more_styles_and_types cannot be reverted.\n";

        return false;
    }
    */
}
