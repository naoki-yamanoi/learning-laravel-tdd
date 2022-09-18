<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\VacancyLevel;

class VacancyLevelTest extends TestCase
{
    /**
     * @param int $remainingCount
     * @param string $expectedMark
     * @dataProvider dataMark
     */
    public function testMark()
    {
        $level = new VacancyLevel(0);
        $this->assertSame('×', $level->mark());

        $level = new VacancyLevel(4);
        $this->assertSame('△', $level->mark());

        $level = new VacancyLevel(5);
        $this->assertSame('◎', $level->mark());
    }

    /**
     * @param int $remainingCount
     * @param string $expectedSlug
     * @dataProvider dataSlug
     */
    public function testSlug(int $remainingCount, string $expectedSlug)
    {
        $level = new VacancyLevel($remainingCount);
        $this->assertSame($expectedSlug, $level->slug());
    }

    public function dataMark()
    {
        return [
            '空きなし' => [
                'remainingCount' => 0,
                'expectedMark' => '×',
            ],
            '残りわずか' => [
                'remainingCount' => 4,
                'expectedMark' => '△',
            ],
            '空き十分' => [
                'remainingCount' => 5,
                'expectedMark' => '◎',
            ],
        ];
    }

    public function dataSlug()
    {
        return [
            '空きなし' => [
                'remainingCount' => 0,
                'expectedSlug' => 'empty',
            ],
            '残りわずか' => [
                'remainingCount' => 3,
                'expectedSlug' => 'few',
            ],
            '空き十分' => [
                'remainingCount' => 5,
                'expectedSlug' => 'enough',
            ],
        ];
    }
}
