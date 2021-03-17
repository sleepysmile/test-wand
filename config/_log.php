<?php

return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => \yii\log\DbTarget::class,
            'levels' => ['error', 'warning'],
        ],
    ],
];