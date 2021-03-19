<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Publication]].
 *
 * @see \app\models\Publication
 */
class PublicationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

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
