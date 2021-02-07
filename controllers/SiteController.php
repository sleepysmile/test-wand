<?php

namespace app\controllers;

use app\actions\CreateCommentAction;
use app\models\Comment;
use app\models\Publication;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $publicationQuery = Publication::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $publicationQuery
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Страница просмотра
     *
     * @param int $id
     * @return string
     */
    public function actionView(int $id)
    {
        $publication = $this->findModel($id);

        return $this->render('view', [
            'publication' => $publication
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
