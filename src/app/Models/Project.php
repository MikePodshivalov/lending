<?php

namespace App\Models;

use App\Models\Enums\ProjectStatus;
use App\Models\Enums\ProjectType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

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
            get: fn($value, $attributes) => ProjectType::make($value),
            set: fn(ProjectType $value, $attributes) => $value->value,
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
            get: fn($value, $attributes) => ProjectStatus::make($value),
            set: fn(ProjectStatus $value, $attributes) => $value->value,
        );
    }
}
