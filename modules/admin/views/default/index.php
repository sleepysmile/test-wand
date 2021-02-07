<?php

/** @var \yii\data\ActiveDataProvider $dataProvider */

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

?>

<div class="admin-default-index">
    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'updated_at',
                'format' => [
                    'date',
                    'php:Y-m-d H:i:s'
                ]
            ],
            'statusName',
            'title',
            [
                'class' => ActionColumn::class
            ]
        ]
    ]) ?>
</div>
