<?php

namespace Database\Seeders\Trait;

use function Termwind\terminal;

/**
 * Трейт содержит функционал для работы с прогрессбаром для сидеров.
 */
trait HasProgressBar
{
    /**
     * Запускает выполнение сидера с использованием прогресс бара.
     * Выполняет форматирование вывода в соответствии со стандартным
     * форматом движка.
     *
     * @param int      $quantity
     * @param callable $callback
     *
     * @return void
     */
    protected function runWithProgressBar(int $quantity, callable $callback): void
    {
        // Возвращаем курсор в начало строки, чтоб затереть название класса
        $this->command->getOutput()->write("\r");

        $bar = $this->command->getOutput()->createProgressBar($quantity);

        // Устанавливаем формат прогрессбара
        $bar->setFormat('  '.self::class.' ===> %current%/%max% [%bar%] %percent:3s%%  ');

        // Устанавливаем ширину прогрессбара на всю ширину консоли или на ту,
        // которая в ларе минимальна
        $width = min(terminal()->width(), 150)
            - 12
            - mb_strlen((string)$quantity) * 2 - 1
            - mb_strlen(self::class) - 6
        ;

        $bar->setBarWidth( max($width, 0));

        $callback($bar);

        $bar->finish();

        // Возвращаем курсор в начало строки, чтоб затереть прогрессбар и вернуть как было
        $this->command->getOutput()->write("\r");
        $this->command->getOutput()->write("  ".self::class." ");
    }
}
