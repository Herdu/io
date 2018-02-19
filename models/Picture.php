<?php

namespace app\models;
use app\models\PictureQuery;

use Yii;

/**
 * This is the model class for table "picture".
 *
 * @property int $id
 * @property string $image_url
 * @property string $title
 */
class Picture extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'picture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['image_url', 'title'], 'string', 'max' => 128],
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
            'image_url' => Yii::t('app', 'Image Url'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * @inheritdoc
     * @return PictureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PictureQuery(get_called_class());
    }

    public function upload()
    {
        if ($this->validate()) {
            $url = 'gallery-photos/'   .Yii::$app->security->generateRandomString(8) . '-'. $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($url);
            return $url;
        } else {
            return false;
        }
    }
}
