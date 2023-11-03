<?php

declare(strict_types=1);

namespace App\Service\Movie\Recommend;

use App\Service\Movie\Recommend\RecommendStrategy\RecommendStrategyInterface;
use App\Repository\MovieRepository;
use Exception;
use Illuminate\Support\Collection;

final class Recommend
{
    private MovieRepository $movieRepository;
    private RecommendStrategyInterface $recommendStrategy;

    public function __construct(MovieRepository $movieRepository, RecommendStrategyInterface $recommendStrategy)
    {
        $this->movieRepository   = $movieRepository;
        $this->recommendStrategy = $recommendStrategy;
    }

    public function find(): Collection
    {
        return $this->recommendStrategy->getMovies($this->movieRepository);
    }
}
