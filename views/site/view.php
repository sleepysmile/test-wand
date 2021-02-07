<?php

/** @var \yii\web\View $this */
/** @var \app\models\Publication $publication */

use app\models\Comment;
use yii\helpers\Html;

?>

<div class="published">
    <div class="published-body">
        <h1 class="published-title"><?= $publication->title ?></h1>

        <div class="published-text"><?= $publication->text ?></div>

        <?= Html::a('Посмотреть и добавить комментарий', ['comment/index', 'encodeOwner' => Comment::encodeOwnerData($publication)], [
            'class' => 'btn btn-success js-commentLoad'
        ]) ?>

        <div class="comment-container"></div>
    </div>
</div>

