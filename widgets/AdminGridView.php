<?php

namespace app\widgets;

use yii\grid\GridView;

/**
 * Class AdminGridView
 * @package app\widgets
 */
class AdminGridView extends GridView
{
    public $tableOptions = ['class' => 'table table-stripped'];

    public $dataColumnClass = AdminDataColumn::class;
}