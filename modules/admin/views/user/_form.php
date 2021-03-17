<?php

/** @var \yii\web\View $this */
/** @var \app\models\User $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username'); ?>

    <?= $form->field($model, 'email'); ?>

    <?= Html::submitButton('save', [
        'class' => 'btn btn-success'
    ]) ?>

    <?php ActiveForm::end() ?>
</div>
