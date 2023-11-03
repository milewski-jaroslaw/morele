<?php

declare(strict_types=1);

namespace App\Service\Movie\Recommend\RecommendStrategy;

use App\Repository\RepositoryInterface;
use Illuminate\Support\Collection;

class MoreThanOneWordStrategy implements RecommendStrategyInterface
{
    public function getMovies(RepositoryInterface $repository): Collection
    {
        return $repository->getDataSource()->filter(function ($item) {
            return preg_match('/\w+\s+\w+/', $item['title']);
        });
    }
}
