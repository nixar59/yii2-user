<?php


namespace nixar59\user\models;


use nixar59\user\interfaces\LoginFormInterface;
use Yii;
use yii\base\Model;

class LoginForm extends Model implements LoginFormInterface
{
    public $phone;
    public $email;
    public $password;

    private $_user;

    public function rules()
    {
        return [
            ['password', 'required'],
            ['email', 'required', 'when' => function() { return !isset($this->phone); }],
            ['phone', 'required', 'when' => function() { return !isset($this->email); }],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword()
    {
        if (!$this->getUser()->validatePassword($this->password)) {
            $this->addError('email', 'Incorrect login or password.');
            $this->addError('phone', 'Incorrect login or password.');
        }
    }

    /**
     * @return bool
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
        return false;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        if (!$this->_user instanceof User) {
            $this->_user = User::findByLogin(isset($this->email) ? $this->email : $this->phone);
        }
        return $this->_user;
    }
}