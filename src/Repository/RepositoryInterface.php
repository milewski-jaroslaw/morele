<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function getDataSource(): Collection;
}
