<?php

/** @var \yii\web\View $this */
/** @var \app\models\Comment[] $comments */
/** @var \app\models\Comment $model */
/** @var string $encodeOwner */

use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<?= $this->render('_form', [
    'model' => $model,
    'encodeOwner' => $encodeOwner
]) ?>

<div class="comment-list">

    <?php foreach ($comments as $comment): ?>

        <?= $this->render('item', [
            'comment' => $comment
        ]) ?>

    <?php endforeach; ?>

</div>

