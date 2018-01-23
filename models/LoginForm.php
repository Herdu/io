<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\ar\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required', 'message' => 'Pole "{attribute}" nie może pozostać puste.'],
            [['email'], 'email', 'message' => 'Wartość pola musi być prawidłowym adresem email.'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Hasło',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params){
        $user = User::find()->where(['email' => $this->email])->one();
        if(!empty($user)){
            if (Yii::$app->getSecurity()->validatePassword($this->password, $user->password)) {
                return true;
            } else {
                $this->addError($attribute, 'Nieprawidłowy email lub hasło');
                return false;
            }
        }
        $this->addError($attribute, 'Nieprawidłowy email lub hasło');
        return false;
    }

    /**
     */
    public function login()
    {
        if ($this->validate()) {
            $identity = User::findOne(['email' => $this->email]);
            Yii::$app->user->login($identity);
            return true;
        }
        return false;
    }

}
