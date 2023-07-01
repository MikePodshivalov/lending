<?php

namespace App\Models\Enums;

/**
 * Сущность статуса проекта
 */
enum ProjectStatus: string
{
    case Preparation = "Подотовка";
    case Realization = "Реализация";
    case Signing = "Подписание";
    case Expectation = 'Ожидание';

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
            self::Preparation->value => self::Preparation,
            self::Realization->value => self::Realization,
            self::Signing->value => self::Signing,
            self::Expectation->value => self::Expectation,
        };
    }
}
