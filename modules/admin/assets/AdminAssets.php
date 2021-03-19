<?php

namespace app\modules\admin\assets;

use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use rmrevin\yii\fontawesome\AssetBundle as  FontAwesome;
use yii\web\JqueryAsset;

class AdminAssets extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/resource';

    public $cssOptions = [
        'forceCopy' => true,
    ];

    public $css = [
        'css/main.css'
    ];

    public $js = [
        'js/main.js'
    ];

    public $depends = [
        FontAwesome::class,
        BootstrapPluginAsset::class,
        JqueryAsset::class,
    ];

}