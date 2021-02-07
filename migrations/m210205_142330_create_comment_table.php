<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m210205_142330_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string()->notNull()->comment('Текст комментария'),
            'owner_class' => $this->string()->notNull()->comment('Класс модели владельца комметария'),
            'owner_id' => $this->string()->notNull()->comment('ID модели владельца комметария')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
