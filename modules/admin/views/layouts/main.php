<?php

/** @var \yii\web\View $this */
/* @var $content string */

use app\modules\admin\assets\AdminAssets;
use yii\helpers\Html;

AdminAssets::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://kit.fontawesome.com/f102d8fbc4.js" crossorigin="anonymous"></script>
</head>
<body>
<?php $this->beginBody() ?>

<?= $this->render('_nav'); ?>

<?= $this->render('_menu'); ?>

<div class="mcw">
    <div class="cv">
        <div>
            <div class="inbox">
                <div class="inbox-bx container-fluid">
                    <div class="row">

                        <?= $this->render('_subMenu'); ?>

                        <div class="col-md-9">
                            <?= $content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>