<?php

namespace App\Models;

use App\Models\Enums\LoanStatus;
use App\Models\Enums\LoanType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    protected $fillable = [
        'name',
        'type',
        'amount',
        'status',
    ];

    /**
     * Модификация аттрибута для работы с типом проекта.
     *
     * @return Attribute
     */
    public function type(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => LoanType::make($value),
            set: fn(LoanType $value, $attributes) => $value->value,
        );
    }

    /**
     * Модификация аттрибута для работы со статусом проекта.
     *
     * @return Attribute
     */
    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => LoanStatus::make($value),
            set: fn(LoanStatus $value, $attributes) => $value->value,
        );
    }
}
