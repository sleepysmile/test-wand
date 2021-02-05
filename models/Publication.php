<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%publication}}".
 *
 * @property int $id
 * @property string|null $title Заголовок публикации
 * @property string|null $text Тектс публикации
 * @property int|null $status Статус публикации
 * @property string $updated_at Дата изменения
 */
class Publication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%publication}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['updated_at'], 'safe'],
            [['title', 'text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок публикации',
            'text' => 'Тектс публикации',
            'status' => 'Статус публикации',
            'updated_at' => 'Дата изменения',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\PublicationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\PublicationQuery(get_called_class());
    }
}
