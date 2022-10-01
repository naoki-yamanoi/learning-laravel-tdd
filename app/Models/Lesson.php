<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    public function remainingCount(): int
    {
        return $this->capacity - $this->reservations()->count();
    }

    public function getVacancyLevelAttribute(): VacancyLevel
    {
        return new VacancyLevel($this->remainingCount());
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
