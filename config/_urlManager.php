<?php

return [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        '<module>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
    ],
];
