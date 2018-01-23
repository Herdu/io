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
            [['image_url', 'title'], 'required'],
            [['image_url', 'title'], 'string', 'max' => 128],
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
}
