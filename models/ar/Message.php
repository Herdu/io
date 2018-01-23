<?php

namespace app\models\ar;
use app\models\aq\MessageQuery;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $email
 * @property int $message_title_id
 * @property string $message_title
 * @property int $furniture_id
 *
 * @property Furniture $furniture
 * @property MessageTitle $messageTitle
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['message_title_id', 'furniture_id'], 'integer'],
            [['email', 'message_title'], 'string', 'max' => 128],
            [['furniture_id'], 'exist', 'skipOnError' => true, 'targetClass' => Furniture::className(), 'targetAttribute' => ['furniture_id' => 'id']],
            [['message_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => MessageTitle::className(), 'targetAttribute' => ['message_title_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'message_title_id' => Yii::t('app', 'Message Title ID'),
            'message_title' => Yii::t('app', 'Message Title'),
            'furniture_id' => Yii::t('app', 'Furniture ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurniture()
    {
        return $this->hasOne(Furniture::className(), ['id' => 'furniture_id'])->inverseOf('messages');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageTitle()
    {
        return $this->hasOne(MessageTitle::className(), ['id' => 'message_title_id'])->inverseOf('messages');
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }
}
