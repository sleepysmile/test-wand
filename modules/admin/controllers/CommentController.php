<?php

namespace app\modules\admin\controllers;

use app\models\Publication;
use Yii;
use app\models\Comment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CommentController implements the CRUD actions for Comment model.
 */
class CommentController extends Controller
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
     * Изменение записи
     *
     * @param integer $id
     * @param int $ownerId
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id, int $ownerId)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['default/view', 'id' => $ownerId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Удаление записи
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id, int $ownerId)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['default/view', 'id' => $ownerId]);
    }

    /**
     * Поиск записи
     * @param integer $id
     * @return Comment the loaded model
     */
    protected function findModel(int $id)
    {
        return Comment::find()
            ->andWhere(['id' => $id])
            ->one();
    }
}
