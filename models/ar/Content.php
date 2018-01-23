<?php

namespace app\models\ar;
use app\models\aq\ContentQuery;
use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property string $image_url
 * @property string $title
 * @property string $description
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['image_url', 'title'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 1024],
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
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @inheritdoc
     * @return ContentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContentQuery(get_called_class());
    }
}
