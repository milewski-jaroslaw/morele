<?php

declare(strict_types=1);

namespace App\Tests\Service\Movie\Recommend;

use App\Service\Movie\Recommend\Recommend;
use App\Repository\MovieRepository;
use App\Service\Movie\Recommend\RecommendStrategy\StartsWithWAndEvenNumberOfCharsStrategy;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StartsWithWAndEvenNumberOfCharsStrategyTest extends TestCase
{
    private array $movies;

    protected function setUp(): void
    {
        parent::setUp();

        $recommend = new Recommend(
            new MovieRepository(), new StartsWithWAndEvenNumberOfCharsStrategy()
        );

        $this->movies = $recommend->find()->toArray();
    }

    #[Test]
    public function checkAllMovieTitlesStartsWithW(): void
    {
        $nonWStartStrings = array_filter($this->movies, static function ($movie) {
            return ! str_starts_with($movie['title'], 'W');
        });

        $this->assertEmpty($nonWStartStrings, 'At least one string does not start with "W"');
    }

    #[Test]
    public function checkAllMovieTitlesHaveAnEvenNumberOfChars(): void
    {
        $lengths    = array_map('strlen', array_column($this->movies, 'title'));
        $oddLengths = array_filter($lengths, static function ($length) {
            return $length % 2 !== 0;
        });

        $this->assertEmpty($oddLengths, 'At least one string has an odd length');
    }
}
