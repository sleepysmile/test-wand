<?php

namespace app\models;

use app\models\query\PublicationQuery;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%publication}}".
 *
 * @property int $id
 * @property string|null $title Заголовок публикации
 * @property string|null $text Текст публикации
 * @property string|null $created_at Дата создания публикации
 * @property string|null $updated_at Дата обнолнея публикации
 * @property string|null $created_by Кем созданна публикации
 * @property string|null $updated_by Кем обновленна публикации
 * @property string|null $published Признак доступности публикации
 */
class Publication extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%publication}}';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class
            ],
            'blameable' => [
                'class' => BlameableBehavior::class
            ],
            'sluggable' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'title'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                    'text',
                    'created_at',
                    'updated_at',
                    'created_by',
                    'updated_by',
                    'published',
                    'slug'
                ],
                'string',
                'max' => 255
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'published' => 'Published',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PublicationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PublicationQuery(get_called_class());
    }
}
