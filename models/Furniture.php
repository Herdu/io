<?php

namespace app\models;
    use app\models\FurnitureQuery;

use Yii;
use yii\base\Security;
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

    public $imageFile;

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
            [['name', 'price', 'description', 'is_renovated', 'furniture_type_id', 'furniture_style_id'], 'required' , 'message'=>'Pole "{attribute}" nie może pozostać puste.'],
            [['price'], 'number' ,  'message'=>'Pole "{attribute}" musi być liczbą.'],
            [['is_renovated', 'furniture_type_id', 'furniture_style_id','width', 'height','depth'], 'integer' ,  'message'=>'Pole "{attribute}" musi być liczbą całkowitą.'],
            [['name', 'image_url'], 'string', 'max' => 128, 'message' => 'Maksymalna długość to 128 znaków!'],
            [['period'], 'string', 'max' => 64, 'message' => 'Maksymalna długość to 64 znaki!'],
            [['description'], 'string', 'max' => 1024 , 'message' => 'Maksymalna długość to 1024 znaków!' ],
            [['furniture_style_id'], 'exist', 'skipOnError' => true, 'targetClass' => FurnitureStyle::className(), 'targetAttribute' => ['furniture_style_id' => 'id']],
            [['furniture_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FurnitureType::className(), 'targetAttribute' => ['furniture_type_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg',  'message'=>'Niepoprawny format pliku.', 'wrongExtension'=>'Dozwolone rozszerzenia pliku to png i jpg.', 'tooBig' => 'Plik jest za duży. Maksymalny rozmiar to 2MB.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Nazwa'),
            'price' => Yii::t('app', 'Cena'),
            'image_url' => Yii::t('app', 'Image Url'),
            'description' => Yii::t('app', 'Opis'),
            'is_renovated' => Yii::t('app', 'Po renowacji'),
            'furniture_type_id' => Yii::t('app', 'Typ'),
            'furniture_style_id' => Yii::t('app', 'Styl'),
            'width' => 'Szerokość',
            'height' => 'Wysokość',
            'depth' => 'głębokość',
            'period' => 'Okres'
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

    public function upload()
    {
        if ($this->validate()) {
            $url = 'uploads/'   .Yii::$app->security->generateRandomString(8) . '-'. $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($url);
            return $url;
        } else {
            return false;
        }
    }
}
