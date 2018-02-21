<?php

namespace app\models;
use app\models\MessageQuery;

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
            [['email', 'text', 'title'], 'required', 'message'=>'Pole "{attribute}" nie może pozostać puste.'],
            [['message_title_id', 'furniture_id'], 'integer' ,  'message'=>'Pole "{attribute}" musi być liczbą całkowitą.'],
            [['email'], 'email', 'message' => 'To pole musi być prawidłowym adresem email.'],
            [['email', 'message_title'], 'string', 'max' => 128, 'message' => 'Pole "{attribute}" musi być łańcuchem znaków.', 'tooLong' => 'To pole może mieć max. długość 128 znaków.'],
            [['text'], 'string', 'max' => 1024, 'message' => 'Pole "{attribute}" musi być łańcuchem znaków.', 'tooLong' => 'To pole może mieć max. długość 1024 znaków.'],
            [['furniture_id'], 'exist', 'skipOnError' => true, 'targetClass' => Furniture::className(), 'targetAttribute' => ['furniture_id' => 'id']],
            [['message_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => MessageTitle::className(), 'targetAttribute' => ['message_title_id' => 'id']],
            [['text'], 'safe'],
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
            'message_title_id' => 'Tytuł',
            'message_title' => 'Tytuł',
            'furniture_id' => Yii::t('app', 'Furniture ID'),
            'text' => 'Treść',
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
