<?php


namespace nixar59\user\models;


use nixar59\user\interfaces\SignupFormInterface;
use yii\base\Model;

class SignupForm extends Model implements SignupFormInterface
{
    public $email;
    public $phone;
    public $password;
    public $passwordConfirm;

    public function rules()
    {
        return [
            [['password', 'passwordConfirm'], 'required'],
            ['email', 'required', 'when' => function() { return !isset($this->phone); }],
            ['phone', 'required', 'when' => function() { return !isset($this->email); }],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/'],
            ['password', 'string', 'min' => 6],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            return (new User(['phone' => $this->phone, 'email' => $this->email, 'password' => $this->password]))->save();
        }
        return false;
    }
}