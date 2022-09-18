<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyLevel extends Model
{
    private $remainingCount;

    public function __construct(int $remainingCount)
    {
        $this->remainingCount = $remainingCount;
    }

    public function __toString()
    {
        return $this->mark();
    }

    public function mark(): string
    {
        $marks = ['empty' => '×', 'few' => '△', 'enough' => '◎'];
        $slug = $this->slug();
        assert(isset($marks[$slug]), new \DomainException('invalid slug value.'));

        return $marks[$slug];
    }

    public function slug(): string
    {
        if ($this->remainingCount === 0) {
            return 'empty';
        }
        if ($this->remainingCount < 5) {
            return 'few';
        }
        return 'enough';
    }
}
