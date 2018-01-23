<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "furniture_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Furniture[] $furnitures
 */
class FurnitureType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'furniture_type';
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
        return $this->hasMany(Furniture::className(), ['furniture_type_id' => 'id'])->inverseOf('furnitureType');
    }

    /**
     * @inheritdoc
     * @return FurnitureTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FurnitureTypeQuery(get_called_class());
    }
}
