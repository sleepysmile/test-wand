<?php

namespace app\interfaces;

/**
 * Интерфейс для модели к которой пренадлежат комментарии
 *
 * Interface Comments
 * @package app\interfaces
 */
interface Comments
{
    /**
     * Класс владельца комментария
     *
     * @return mixed
     */
    public function getClass(): string;

    /**
     * ID владельца комментария
     *
     * @return mixed
     */
    public function getId(): int;
}