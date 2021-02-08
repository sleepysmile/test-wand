<?php

use yii\db\Migration;

/**
 * Class m210208_072235_add_fk_key_comment_table
 */
class m210208_072235_add_ik_key_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('ik_class_id', 'comment', ['owner_class', 'owner_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('ik_class_id', 'comment');
    }

}
