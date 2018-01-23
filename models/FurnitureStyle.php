<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "furniture_style".
 *
 * @property int $id
 * @property string $name
 *
 * @property Furniture[] $furnitures
 */
class FurnitureStyle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'furniture_style';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurnitures()
    {
        return $this->hasMany(Furniture::className(), ['furniture_style_id' => 'id'])->inverseOf('furnitureStyle');
    }

    /**
     * @inheritdoc
     * @return \app\models\FurnitureStyleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\FurnitureStyleQuery(get_called_class());
    }
}
