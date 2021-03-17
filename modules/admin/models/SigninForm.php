<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * Class SigninForm
 * Модель авторизации для админки
 *
 * @package app\modules\admin\models
 *
 * @property User $user
 */
class SigninForm extends Model
{
    /** @var string|null */
    public ?string $username = null;

    /** @var string|null */
    public ?string $password = null;

    /** @var bool  */
    public bool $rememberMe = false;

    /**
     * User model
     *
     * @var User|null
     */
    protected ?User $_user = null;

    /**
     * {@inheritdoc}
     * @return array
     */
    public function rules(): array
    {
        return [
            [['username', 'password'], 'string'],
            [
                ['username'],
                'exist',
                'targetClass' => User::class,
                'targetAttribute' => [
                    'username' => 'username'
                ],
                'message' => 'Такого пользователя не существует'
            ],
            [
                ['username'],
                'rolePermission'
            ],
            [
                ['password'],
                'validatePassword'
            ],
        ];
    }

    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    public function login(): bool
    {
        if ($this->validate() && $this->user->isAdmin()) {
            return Yii::$app->user->login($this->user, $this->rememberMe ? 60 * 30 : 0);
        }

        return false;
    }

    /**
     * @param $attribute
     */
    public function validatePassword($attribute)
    {
        if (!$this->user->validatePassword($this->password)) {
            $this->addError($attribute, 'Неверный пароль');
        }
    }

    public function rolePermission($attribute)
    {
        if (!$this->user->isAdmin()) {
            $this->addError($attribute, 'У вас нет доступа');
        }
    }

    /**
     * @return User|null
     */
    protected function getUser(): ?User
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

}