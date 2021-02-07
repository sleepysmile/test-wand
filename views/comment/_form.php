<?php

/** @var \yii\web\View $this */
/** @var \app\models\Comment $model */
/** @var string $encodeOwner */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="error-block">

</div>

<?php $form = ActiveForm::begin([
    'action' => ['comment/create', 'encodeOwner' => $encodeOwner],
    'options' => [
        'class' => 'js-commentForm',
        'data' => [
            'pjax' => 'false'
        ]
    ]
]) ?>
<div class="form-group">

    <?= $form->field($model, 'text')->textInput() ?>

    <?= Html::submitButton('Оставить комментарий', [
        'class' => 'btn btn-success'
    ]) ?>

</div>

<?php ActiveForm::end() ?>
