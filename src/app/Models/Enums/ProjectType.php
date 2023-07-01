<?php

namespace App\Models\Enums;

/**
 * Сущность типа для проекта
 */
enum ProjectType: string
{
    case Loan = "Кредитная заявка";
    case ChangingConditions = "Изменение условий";
    case ChangeOfCollateral = "Изменение обеспечения";

    /**
     * Создание енама типа для проекта.
     *
     * @param string $type
     *
     * @return ProjectType
     */
    public static function make(string $type): ProjectType
    {
        return match ($type) {
            self::Loan->value => self::Loan,
            self::ChangingConditions->value => self::ChangingConditions,
            self::ChangeOfCollateral->value => self::ChangeOfCollateral,
        };
    }
}
