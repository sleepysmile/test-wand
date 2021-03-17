<?php


namespace app\modules\admin\controllers;

use app\modules\admin\models\SigninForm;
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
    public function actionSignIn(): string
    {
        $singinForm = new SigninForm();
        $request = Yii::$app->request;

        if ($request->isPost) {
            if ($singinForm->load($request->post()) && $singinForm->login()) {
                $this->redirect('/admin/default/index');
            }
        }

        return $this->render('sing-in', [
            'singinForm' => $singinForm
        ]);
    }

    public function actionLogout()
    {
        if (Yii::$app->user->logout()) {
            $this->redirect('/site/index');
        }

        $this->redirect('/admin/default/index');
    }

    public function actionEdit()
    {
        $model = Yii::$app->user->identity;

        return $this->render('update', [
            'model' => $model
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