<?php

/** @var \yii\web\View $this */
/** @var \app\modules\admin\models\SigninForm $singinForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($singinForm, 'username')->textInput(); ?>

    <?= $form->field($singinForm, 'password')->passwordInput(); ?>

    <?= Html::submitButton('Sign in', [
        'class' => 'btn btn-success'
    ]); ?>

    <?php ActiveForm::end(); ?>

</div>
