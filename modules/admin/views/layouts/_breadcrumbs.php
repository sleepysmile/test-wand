<?php

/** @var \yii\web\View $this */

use yii\widgets\Breadcrumbs;

?>

<?php try {
    echo Breadcrumbs::widget([
        'options' => [
            'class' => 'nav navbar-nav ml-auto'
        ],
        'homeLink' => false,
        'itemTemplate' => '<li class="nav-item">{link}</li>',
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]);
} catch (\Throwable $e) {
    Yii::error($e->getMessage());
} ?>