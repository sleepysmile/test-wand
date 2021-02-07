<?php

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */

use yii\grid\ActionColumn;
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'title',
            'announcement',
            [
                'class' => ActionColumn::class,
                'template' => '{view}'
            ]
        ]
    ]) ?>

</div>
