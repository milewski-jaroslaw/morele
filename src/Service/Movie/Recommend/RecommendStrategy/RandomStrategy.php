<?php

declare(strict_types=1);

namespace App\Service\Movie\Recommend\RecommendStrategy;

use App\Repository\RepositoryInterface;
use Illuminate\Support\Collection;

class RandomStrategy implements RecommendStrategyInterface
{
    public const MOVIES_COUNT = 3;

    public function getMovies(RepositoryInterface $repository): Collection
    {
        return $repository->getDataSource()->random(self::MOVIES_COUNT);
    }
}
