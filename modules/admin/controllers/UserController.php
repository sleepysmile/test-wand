<?php


namespace app\modules\admin\controllers;

use app\modules\admin\models\SignupFrom;
use Yii;

/**
 * Class UserController
 * @package app\modules\admin\controllers
 */
class UserController extends AdminController
{
    /**
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionSignUp(): string
    {
        $singup = new SignupFrom();
        $request = Yii::$app->request;

        if ($request->isPost) {
            $singup->load($request->post());

            if ($singup->signup()) {
                $this->redirect(['success']);
            }
        }

        return $this->render('sign-up', [
            'singup' => $singup
        ]);
    }

    /**
     * @return string
     */
    public function actionSuccess()
    {
        return $this->render('success');
    }
    
}