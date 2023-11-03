<?php

declare(strict_types=1);

namespace App\Tests\Service\Movie\Recommend;

use App\Repository\MovieRepository;
use App\Service\Movie\Recommend\Recommend;
use App\Service\Movie\Recommend\RecommendStrategy\MoreThanOneWordStrategy;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class MoreThanOneWordStrategyTest extends TestCase
{
    private Recommend $recommend;

    protected function setUp(): void
    {
        parent::setUp();

        $this->recommend = new Recommend(
            new MovieRepository(), new MoreThanOneWordStrategy()
        );
    }

    #[Test]
    public function getMoviesWithMoreThanOneWord(): void
    {
        $movies = $this->recommend->find();

        $this->assertCount(53, $movies, 'The number of movies with more than 1 word does not match');
    }
}
