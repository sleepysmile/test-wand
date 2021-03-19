<?php

namespace app\modules\admin\assets;

use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class AdminAssets extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/resource';

    public $css = [
        'css/main.css'
    ];

    public $js = [
        'js/main.js'
    ];

    public $depends = [
        BootstrapPluginAsset::class,
        JqueryAsset::class,
    ];

}