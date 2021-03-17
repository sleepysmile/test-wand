<?php

/** @var \yii\web\View $this */
/** @var \app\modules\admin\models\SignupFrom $singup */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($singup, 'username')->textInput(); ?>

        <?= $form->field($singup, 'email')->textInput(); ?>

        <?= $form->field($singup, 'password')->passwordInput(); ?>

        <?= Html::submitButton('Register', [
            'class' => 'btn btn-success'
        ]); ?>

    <?php ActiveForm::end(); ?>
</div>
