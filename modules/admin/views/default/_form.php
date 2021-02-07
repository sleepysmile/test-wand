<?php

/** @var \yii\web\View $this */
/** @var Publication $publication */

use app\models\Publication;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="publication-form">
    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($publication, 'title')->textInput() ?>

    <?= $form->field($publication, 'text')->textarea() ?>

    <?= $form->field($publication, 'status')->dropDownList(
        Publication::statuses()
    ) ?>

    <?= Html::submitButton('Сохранить запись', [
        'class' => 'btn btn-success'
    ]) ?>

    <?php ActiveForm::end() ?>

</div>

