<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message_title".
 *
 * @property int $id
 * @property string $name
 *
 * @property Message[] $messages
 */
class MessageTitle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_title';
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
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['message_title_id' => 'id'])->inverseOf('messageTitle');
    }

    /**
     * @inheritdoc
     * @return MessageTitleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageTitleQuery(get_called_class());
    }
}
