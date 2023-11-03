<?php

declare(strict_types=1);

namespace App\Service\Movie\Recommend\RecommendStrategy;

use App\Repository\RepositoryInterface;
use Illuminate\Support\Collection;

interface RecommendStrategyInterface
{
    public function getMovies(RepositoryInterface $repository): Collection;
}
