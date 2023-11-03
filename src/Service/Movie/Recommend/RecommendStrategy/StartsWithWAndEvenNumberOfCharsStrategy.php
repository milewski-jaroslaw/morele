<?php

declare(strict_types=1);

namespace App\Service\Movie\Recommend\RecommendStrategy;

use App\Repository\RepositoryInterface;
use Illuminate\Support\Collection;

class StartsWithWAndEvenNumberOfCharsStrategy implements RecommendStrategyInterface
{
    public const TITLE_STARTS_WITH_CHAR = 'W';

    public function getMovies(RepositoryInterface $repository): Collection
    {
        $moviesData     = $repository->getDataSource();
        $startsWithChar = $this->whereStartsWith($moviesData);

        return $this->whereEvenNumberOfChars($startsWithChar);
    }

    private function whereStartsWith(Collection $collection): Collection
    {
        return $collection->filter(function ($movie) {
            return str_starts_with($movie['title'], self::TITLE_STARTS_WITH_CHAR);
        });
    }

    private function whereEvenNumberOfChars(Collection $collection): Collection
    {
        return $collection->filter(function ($movie) {
            return strlen($movie['title']) % 2 === 0;
        });
    }
}
