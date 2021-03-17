<?php

namespace app\modules\admin\controllers;

use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionExample()
    {
        return $this->render('example');
    }
}
