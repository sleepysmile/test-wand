<?php

namespace app\commands;

use app\models\User;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * Class InitController
 * @package app\commands
 */
class InitController extends Controller
{
    public function actionUsers()
    {
        $auth = Yii::$app->authManager;

        $admin = new User();
        $admin->username = 'webmaster';
        $admin->email = 'webmaster@ya.ru';
        $admin->generateAuthKey();
        $admin->setPassword('webmaster');

        if ($admin->save()) {
            $role = $auth->getRole('admin');
            $auth->assign($role, $admin->id);
        }

        $user = new User();
        $user->username = 'user';
        $user->email = 'user@ya.ru';
        $user->generateAuthKey();
        $user->setPassword('user');

        if ($user->save()) {
            $role = $auth->getRole('user');
            $auth->assign($role, $user->id);
        }
    }

    public function actionRole()
    {
        $auth = Yii::$app->authManager;

        $user = $auth->createRole('user');
        $user->name = 'user';
        $user->description = 'User permission';

        $admin = $auth->createRole('admin');
        $admin->name = 'admin';
        $admin->description = 'Admin permission';

        $auth->add($user);
        $auth->add($admin);
        $auth->addChild($admin, $user);

        return ExitCode::OK;
    }

}