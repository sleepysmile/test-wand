<?php

namespace app\modules\admin;

use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Module;
use yii\web\GroupUrlRule;

/**
 * admin module definition class
 */
class AdminModule extends Module implements BootstrapInterface
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

    /**
     * @param Application $app
     */
    public function bootstrap($app)
    {
        $app->urlManager->addRules([
            new GroupUrlRule([
                'prefix' => '/admin/',
                'routePrefix' => '/admin/',
                'rules' => [
                    ['pattern' => '', 'route' => 'default/index'],
                    ['pattern' => 'test', 'route' => 'default/example'],
                ]
            ])
        ], false);
    }
}
