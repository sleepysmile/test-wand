<?php

/** @var \yii\web\View $this */
/** @var \app\models\Publication $publication */

?>

<div class="publication-create">

    <?= $this->render('_form', [
        'publication' => $publication
    ]) ?>

</div>
