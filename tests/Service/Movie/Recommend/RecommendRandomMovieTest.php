<?php

declare(strict_types=1);

namespace App\Tests\Service\Movie\Recommend;

use App\Service\Movie\Recommend\Recommend;
use App\Service\Movie\Recommend\RecommendStrategy\RandomStrategy;
use App\Repository\MovieRepository;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class RecommendRandomMovieTest extends TestCase
{
    private Recommend $recommend;

    protected function setUp(): void
    {
        parent::setUp();

        $this->recommend = new Recommend(
            new MovieRepository(), new RandomStrategy()
        );
    }

    #[Test]
    public function getThreeRandomMovies(): void
    {
        $this->assertCount(3, $this->recommend->find(), 'The number of movies is not equal to 3');
    }
}
