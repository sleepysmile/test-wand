<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%publication}}`.
 */
class m210319_103302_add_column_to_publication_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('publication', 'title', $this->string()->comment('Заголовок публикации'));
        $this->addColumn('publication', 'slug', $this->string()->comment('Слаг публикации'));
        $this->addColumn('publication', 'text', $this->string()->comment('Текст публикации'));
        $this->addColumn('publication', 'created_at', $this->string()->comment('Дата создания публикации'));
        $this->addColumn('publication', 'updated_at', $this->string()->comment('Дата обнолнея публикации'));
        $this->addColumn('publication', 'created_by', $this->string()->comment('Кем созданна публикации'));
        $this->addColumn('publication', 'updated_by', $this->string()->comment('Кем обновленна публикации'));
        $this->addColumn('publication', 'published', $this->string()->comment('Признак доступности публикации'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('publication', 'title');
        $this->dropColumn('publication', 'slug');
        $this->dropColumn('publication', 'text');
        $this->dropColumn('publication', 'created_at');
        $this->dropColumn('publication', 'updated_at');
        $this->dropColumn('publication', 'created_by');
        $this->dropColumn('publication', 'updated_by');
        $this->dropColumn('publication', 'published');
    }
}
