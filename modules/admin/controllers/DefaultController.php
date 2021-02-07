<?php

namespace app\modules\admin\controllers;

use app\models\Comment;
use app\models\Publication;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Список записей
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

    /**
     * Создание записи
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $publication = new Publication();
        $post = Yii::$app->request->post();

        if ($publication->load($post) && $publication->save()) {
            return $this->redirect('index');
        }

        return $this->render('create', [
            'publication' => $publication
        ]);
    }

    /**
     * Изменение записи
     *
     * @param int $id
     * @return string
     */
    public function actionUpdate(int $id)
    {
        $publication = $this->findModel($id);
        $post = Yii::$app->request->post();

        if ($publication->load($post) && $publication->save()) {
            return $this->redirect('index');
        }

        return $this->render('update', [
            'publication' => $publication
        ]);
    }

    /**
     * Удаление записи
     *
     * @param int $id
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('index');
    }

    public function actionView(int $id)
    {
        $publication = $this->findModel($id);
        $commentsQuery = Comment::getCommentsQueryByModel($publication);
        $commentProvider = new ActiveDataProvider([
            'query' => $commentsQuery,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        return $this->render('view', [
            'publication' => $publication,
            'commentProvider' => $commentProvider
        ]);
    }

    /**
     * Поиск записи
     *
     * @param int $id
     * @return Publication|array|null
     */
    protected function findModel(int $id)
    {
        return Publication::find()
            ->andWhere(['id' => $id])
            ->one();
    }
}
