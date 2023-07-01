<?php

namespace App\Models\Enums;

/**
 * Сущность статуса проекта
 */
enum ProjectStatus: string
{
    case Active = "Активный";
    case Pause = "Пауза";
    case Rejection = "Отказ";
    case Done = 'Реализован';

    /**
     * Создание енама статуса проекта.
     *
     * @param string $status
     *
     * @return ProjectStatus
     */
    public static function make(string $status): ProjectStatus
    {
        return match ($status) {
            self::Active->value => self::Active,
            self::Pause->value => self::Pause,
            self::Rejection->value => self::Rejection,
            self::Done->value => self::Done,
        };
    }
}
