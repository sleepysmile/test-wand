<?php

namespace app\modules\admin\controllers;

use app\models\Publication;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $publicationsQuery = Publication::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $publicationsQuery
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $publication = new Publication();
        $post = Yii::$app->request->post();

        if ($publication->load($post) && $publication->save()) {
            return $this->redirect('default/index');
        }

        return $this->render('create', [
            'publication' => $publication
        ]);
    }
}
