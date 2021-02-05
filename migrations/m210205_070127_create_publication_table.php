<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%publication}}`.
 */
class m210205_070127_create_publication_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%publication}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->comment('Заголовок публикации'),
            'text' => $this->string()->comment('Тектс публикации'),
            'status' => $this->tinyInteger()->comment('Статус публикации'),
            'updated_at' => $this->timestamp()->comment('Дата изменения')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%publication}}');
    }

}
