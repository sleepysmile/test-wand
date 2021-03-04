<?php

namespace app\modules\admin;

use yii\base\Module;

/**
 * admin module definition class
 */
class AdminModule extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @var string
     */
    public $layoutPath = '@app/modules/admin/views/layouts';

    /**
     * @var string
     */
    public $layout = 'main';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
    }
}
