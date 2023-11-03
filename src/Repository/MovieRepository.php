<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Collection;

class MovieRepository implements RepositoryInterface
{
    public Collection $data;

    public function __construct()
    {
        $data = include __DIR__.DIRECTORY_SEPARATOR."../../database/movies.php";
        $collection = new Collection($data);
        $this->data = $collection->map(function ($item) {
            return ['title' => $item];
        });
    }

    public function getDataSource(): Collection
    {
        return $this->data;
    }
}
