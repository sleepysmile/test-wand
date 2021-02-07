<?php

namespace app\models\query;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\app\models\Publication]].
 *
 * @see \app\models\Publication
 */
class PublicationQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return \app\models\Publication[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Publication|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
