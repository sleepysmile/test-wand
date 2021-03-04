<?php

namespace app\modules\admin\models;

use app\models\User;
use yii\base\Model;

/**
 * Class SignupFrom
 * @package app\modules\admin\models
 */
class SignupFrom extends Model
{
    /** @var string */
    public $username;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            [
                'username',
                'unique',
                'targetClass' => 'app\models\User',
                'message' => 'This username has already been taken.'
            ],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [
                'email',
                'unique',
                'targetClass' => 'app\models\User',
                'message' => 'This email address has already been taken.'
            ],

            ['password', 'required'],
        ];
    }

    /**
     * @return bool
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new User();
        $user->attributes = $this->attributes;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save();
    }
}