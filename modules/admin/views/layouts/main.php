<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\modules\admin\assets\AdminAssets;
use app\widgets\AdminMenu;
use yii\helpers\Html;

/** @var \app\models\User $user */
$user = Yii::$app->user->identity;
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
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><?= Yii::$app->name ?></h3>
        </div>

        <?php try {
            echo AdminMenu::widget([
                'activateParents' => true,
                'submenuOptions' => [
                    'class' => 'collapse list-unstyled'
                ],
                'items' => [
                    [
                        'label' => 'User info (' . $user->username . ')',
                        'items' => [
                            [
                                'label' => 'Edit',
                                'url' => ['/admin/user/edit'],
                            ],
                            [
                                'label' => 'Logout',
                                'url' => ['/admin/user/logout'],
                                'linkOptions' => [
                                    'data' => [
                                        'method' => 'post'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    [
                        'label' => 'Directory',
                        'items' => [
                            [
                                'label' => 'Publications',
                                'url' => ['/admin/publication/index/'],
                                'active' => true
                            ],
                        ],
                    ],
                ],
                'options' => [
                    'class' => 'list-unstyled components'
                ],
            ]);
        } catch (\Throwable $e) {
            Yii::error($e->getMessage());
        } ?>

    </nav>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-align-left"></i>
                </button>

                <?php if (array_key_exists('breadcrumbs', $this->params)): ?>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="dark-blue-text">
                            <i class="fas fa-bars fa-1x"></i>
                        </span>
                    </button>

                <?php endif; ?>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?= $this->render('_breadcrumbs') ?>
                </div>
            </div>
        </nav>

        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

