<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Base admin controller
 *
 * Class AdminController
 * @package app\modules\admin\controllers
 */
class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => [
                        'post',
                    ],
                ],
            ],
        ];
    }
}