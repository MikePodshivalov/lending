<?php

namespace App\Models\Enums;

/**
 * Сущность статуса проекта
 */
enum LoanStatus: string
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
     * @return LoanStatus
     */
    public static function make(string $status): LoanStatus
    {
        return match ($status) {
            self::Preparation->value => self::Preparation,
            self::Realization->value => self::Realization,
            self::Signing->value => self::Signing,
            self::Expectation->value => self::Expectation,
        };
    }
}
