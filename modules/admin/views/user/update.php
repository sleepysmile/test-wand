<?php

/** @var \yii\web\View $this */
/** @var \app\models\User $model */

$this->params['breadcrumbs'] = ['label' => 'User data edit'];

?>

<div>
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
