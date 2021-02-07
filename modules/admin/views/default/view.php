<?php

/** @var \yii\web\View $this */
/** @var \app\models\Publication $publication */
/** @var \yii\data\ActiveDataProvider $commentProvider */

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

?>

<p>
    <?= Html::a('Редактировать', ['update', 'id' => $publication->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(
        'Удалить',
        ['delete', 'id' => $publication->id],
        [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]
    ) ?>
</p>

<?= DetailView::widget([
    'model' => $publication
]) ?>

<?= GridView::widget([
    'dataProvider' => $commentProvider,
    'columns' => [
        'id',
        'text',
        [
            'class' => ActionColumn::class,
            'template' => '{delete} {update}',
            'controller' => 'comment',
            'urlCreator' => function (string $action, $model, $key, $index, $actionColumn) use ($publication) {
                $url = $actionColumn->controller ? $actionColumn->controller . '/' . $action : $action;
                return Url::toRoute([$url, 'id' => $model->id, 'ownerId' => $publication->id]);
            }
        ]
    ]
]) ?>
