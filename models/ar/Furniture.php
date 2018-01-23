<?php

namespace app\models\ar;
use app\models\aq\FurnitureQuery;

use Yii;

/**
 * This is the model class for table "furniture".
 *
 * @property int $id
 * @property string $name
 * @property double $price
 * @property string $image_url
 * @property string $description
 * @property int $is_renovated
 * @property int $furniture_type_id
 * @property int $furniture_style_id
 *
 * @property FurnitureStyle $furnitureStyle
 * @property FurnitureType $furnitureType
 * @property Message[] $messages
 */
class Furniture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'furniture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'description', 'is_renovated', 'furniture_type_id', 'furniture_style_id'], 'required'],
            [['price'], 'number'],
            [['is_renovated', 'furniture_type_id', 'furniture_style_id'], 'integer'],
            [['name', 'image_url'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 1024],
            [['furniture_style_id'], 'exist', 'skipOnError' => true, 'targetClass' => FurnitureStyle::className(), 'targetAttribute' => ['furniture_style_id' => 'id']],
            [['furniture_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FurnitureType::className(), 'targetAttribute' => ['furniture_type_id' => 'id']],
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
            'price' => Yii::t('app', 'Price'),
            'image_url' => Yii::t('app', 'Image Url'),
            'description' => Yii::t('app', 'Description'),
            'is_renovated' => Yii::t('app', 'Is Renovated'),
            'furniture_type_id' => Yii::t('app', 'Furniture Type ID'),
            'furniture_style_id' => Yii::t('app', 'Furniture Style ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurnitureStyle()
    {
        return $this->hasOne(FurnitureStyle::className(), ['id' => 'furniture_style_id'])->inverseOf('furnitures');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurnitureType()
    {
        return $this->hasOne(FurnitureType::className(), ['id' => 'furniture_type_id'])->inverseOf('furnitures');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['furniture_id' => 'id'])->inverseOf('furniture');
    }

    /**
     * @inheritdoc
     * @return FurnitureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FurnitureQuery(get_called_class());
    }
}
