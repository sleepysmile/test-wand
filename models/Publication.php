<?php

namespace app\models;

use app\interfaces\Comments;
use app\models\query\PublicationQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%publication}}".
 *
 * @property int $id
 * @property string|null $title Заголовок публикации
 * @property string|null $text Тектс публикации
 * @property int|null $status Статус публикации
 * @property string $updated_at Дата изменения
 * @property string $announcement Анонс публикации
 * @property string $statusName Наименование статуса
 */
class Publication extends ActiveRecord implements Comments
{
    /** @var int - Статус публикации активна */
    public const STATUS_ACTIVE = 1;

    /** @var int - Статус публикации не активна */
    public const STATUS_INACTIVE = 0;

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
            'statusName' => 'Статус',
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

    /**
     * Краткое содержание публикации
     *
     * @return string
     */
    public function getAnnouncement(): string
    {
        return mb_substr($this->text, 0, 50);
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getClass(): string
    {
        return self::class;
    }

    /**
     * {@inheritdoc}
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Возвращает наимменование статуса
     *
     * @return int|string
     */
    public function getStatusName()
    {
        $statuses = self::statuses();

        return $statuses[$this->status];
    }

    /**
     * Возвращает список статусов для публикации
     *
     * @return int[]
     */
    public static function statuses()
    {
        return [
            self::STATUS_ACTIVE => 'Активна',
            self::STATUS_INACTIVE => 'Не активна'
        ];
    }

}
